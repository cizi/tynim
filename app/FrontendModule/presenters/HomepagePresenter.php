<?php

namespace App\FrontendModule\Presenters;

use App\Forms\ContactForm;
use Nette;
use App\Enum\WebWidthEnum;
use App\Model\SliderSettingRepository;
use App\Model\SliderPicRepository;
use App\Model\WebconfigRepository;
use App\FrontendModule\Presenters;
use Nette\Http\FileUpload;

class HomepagePresenter extends BasePresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var SliderSettingRepository */
	private $sliderSettingRepository;

	/** var SliderPicRepository */
	private $sliderPicRepository;

	/** @var ContactForm */
	private $contactForm;

	public function __construct(
		WebconfigRepository $webconfigRepository,
		SliderSettingRepository $sliderSettingRepository,
		SliderPicRepository $sliderPicRepository,
		ContactForm $contactForm
	) {
		$this->webconfigRepository = $webconfigRepository;
		$this->sliderSettingRepository = $sliderSettingRepository;
		$this->sliderPicRepository = $sliderPicRepository;
		$this->contactForm = $contactForm;
	}

	/**
	 * data init for settings values in template
	 */
	public function startup() {
		parent::startup();
		$this->loadWebConfig();
		$this->loadSliderConfig();
		$this->loadFooterConfig();
	}

	public function renderDefault() {

	}


	/**
	 * Proceed contact form
	 *
	 * @param Nette\Application\UI\Form $form
	 * @param $values
	 * @throws \Exception
	 * @throws \phpmailerException
	 */
	public function contactFormSubmitted($form, $values) {
		if (
			isset($values['contactEmail']) && $values['contactEmail'] != ""
			&& isset($values['name']) && $values['name'] != ""
			&& isset($values['subject']) && $values['subject'] != ""
			&& isset($values['text']) && $values['text'] != ""
		) {
			$path = "";
			$send = true;
			if (!empty($values['attachment'])) {
				/** @var FileUpload $file */
				$file = $values['attachment'];
				if (!empty($file->name)) {
					if (
						substr($file->name, -3) != "png" && substr($file->name, -3) != "PNG"
						&& substr($file->name, -3) != "jpg" && substr($file->name, -3) != "JPG"
						&& substr($file->name, -3) != "bmp" && substr($file->name, -3) != "BMP"
						&& substr($file->name, -3) != "pdf" && substr($file->name, -3) != "PDF"
						&& substr($file->name, -3) != "doc" && substr($file->name, -3) != "DOC"
						&& substr($file->name, -3) != "xls" && substr($file->name, -3) != "XLS"
						&& substr($file->name, -4) != "docx" && substr($file->name, -4) != "DOCX"
						&& substr($file->name, -3) != "xlsx" && substr($file->name, -3) != "XLSX"
					) {
						$this->flashMessage(CONTACT_FORM_UNSUPPORTED_FILE_FORMAT, "alert-danger");
						$send = false;
					} else {
						$path = UPLOAD_PATH . '/' . date("Ymd-His") . "-" . $file->name;
						$file->move($path);
					}
				}
			}

			if ($send) {
				$email = new \PHPMailer();
				$email->From = $values['contactEmail'];
				$email->FromName = $values['name'];
				$email->Subject = CONTACT_FORM_EMAIL_MY_SUBJECT . $values['subject'];
				$email->Body = $values['text'];
				$email->AddAddress('cizi@email.cz');
				if (!empty($path)) {
					$email->AddAttachment($path);
				}
				$email->Send();
				$this->flashMessage(CONTACT_FORM_WAS_SENT, "alert-success");
			}
		} else {
			$this->flashMessage(CONTACT_FORM_SENT_FAILED, "alert-danger");
		}
		$this->redirect("default");
	}

	public function createComponentContactForm() {
		$form = $this->contactForm->create();
		$form->onSuccess[] = $this->contactFormSubmitted;
		return $form;
	}

	/**
	 * It loads config from admin to page
	 */
	private function loadWebConfig() {
		$langSession = $this->session->getSection('webLang');
		$lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');

		// depending on language
		$this->template->title = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_TITLE, $lang);
		$this->template->googleAnalytics = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_GOOGLE_ANALYTICS, $lang);
		$this->template->webKeywords = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_KEYWORDS, $lang);

		// language free
		$widthEnum = new WebWidthEnum();
		$langCommon = WebconfigRepository::KEY_LANG_FOR_COMMON;
		$this->template->favicon = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_FAVICON, $langCommon);
		$this->template->bodyWidth = $widthEnum->getValueByKey($this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_WIDTH, $langCommon));
		$this->template->bodyBackgroundColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_BODY_BACKGROUND_COLOR, $langCommon);
		$this->template->showMenu = ($this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_SHOW_MENU, $langCommon) == 1 ? true : false);
		$this->template->showHomeButtonInMenu = ($this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_SHOW_HOME, $langCommon) == 1 ? true : false);
		$this->template->menuColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_MENU_BG, $langCommon);
		$this->template->menuLinkColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_MENU_LINK_COLOR, $langCommon);
	}

	/**
	 * It loads slider option to page
	 */
	private function loadSliderConfig() {
		// slider and its pics
		if ($this->sliderSettingRepository->getByKey(SliderSettingRepository::KEY_SLIDER_ON)) {
			$this->template->sliderEnabled = true;
			$this->template->sliderPics = $this->sliderPicRepository->findPics();

			$widthEnum = new WebWidthEnum();
			$widthOption = $this->sliderSettingRepository->getByKey(SliderSettingRepository::KEY_SLIDER_WIDTH);
			$width = $widthEnum->getValueByKey($widthOption);
			$this->template->sliderWidth = (empty($width) ? "100%" : $width);
			$this->template->sliderSpeed = $this->sliderSettingRepository->getByKey(SliderSettingRepository::KEY_SLIDER_TIMING) * 1000;
			$this->template->slideShow = ($this->sliderSettingRepository->getByKey(SliderSettingRepository::KEY_SLIDER_SLIDE_SHOW) == "1" ? true : false);
			$this->template->sliderControls = ($this->sliderSettingRepository->getByKey(SliderSettingRepository::KEY_SLIDER_CONTROLS) == "1" ? true : false);
		} else {
			$this->template->sliderEnabled = false;
			$this->template->sliderPics = [];
		}
	}

	/**
	 * It loads info about footer
	 */
	private function loadFooterConfig() {
		$langCommon = WebconfigRepository::KEY_LANG_FOR_COMMON;
		$this->template->showFooter = $showFooter = ($this->webconfigRepository->getByKey(WebconfigRepository::KEY_SHOW_FOOTER, $langCommon) == 1 ? true : false);
		if ($showFooter) {
			$widthEnum = new WebWidthEnum();

			$this->template->footerBg = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_FOOTER_BACKGROUND_COLOR, $langCommon);
			$this->template->footerColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_FOOTER_COLOR, $langCommon);
			$this->template->footerWidth = $widthEnum->getValueByKey($this->webconfigRepository->getByKey(WebconfigRepository::KEY_FOOTER_WIDTH, $langCommon));

			// img path fixing
			$footerContent = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_FOOTER_CONTENT, $langCommon);
			$this->template->footerContent = str_replace("../../upload/", "./upload/", $footerContent);
		}

		$contactFormInFooter = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_SHOW_CONTACT_FORM_IN_FOOTER, $langCommon);
		$this->template->isContactFormInFooter = ($contactFormInFooter == "1" ? true : false);
		if ($contactFormInFooter) {
			$this->template->contactFormHeader = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_TITLE, $langCommon);
			$this->template->contactFormContent = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_CONTENT, $langCommon);
			$this->template->contactFormBackground = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_BACKGROUND_COLOR, $langCommon);
			$this->template->contactFormColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_COLOR, $langCommon);

			$allowAttachment = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_CONTACT_FORM_ATTACHMENT, $langCommon);
			$this->template->allowAttachment =  ($allowAttachment == "1" ? true : false);
		}
	}
}
