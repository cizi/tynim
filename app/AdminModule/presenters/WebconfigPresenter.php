<?php

namespace App\AdminModule\Presenters;

use App\Controller\FileController;
use App\Forms\WebconfigForm;
use App\Model\LangRepository;
use App\Model\WebconfigRepository;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;

class WebconfigPresenter extends SignPresenter {

	/** @consts depends on language */
	private $LANG_DEPENDS = [WebconfigRepository::KEY_WEB_TITLE, WebconfigRepository::KEY_WEB_GOOGLE_ANALYTICS, WebconfigRepository::KEY_WEB_KEYWORDS];

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var LangRepository */
	private $langRepository;

	/** @var WebconfigForm */
	private $configForm;

	/** @var string */
	private $webCurrentLang;

	/**
	 * @param WebconfigRepository $webconfigRepository
	 * @param WebconfigForm $webconfigForm
	 * @param LangRepository $langRepository
	 */
	public function __construct(
		WebconfigRepository $webconfigRepository,
		WebconfigForm $webconfigForm,
		LangRepository $langRepository
	) {
		$this->webconfigRepository = $webconfigRepository;
		$this->configForm = $webconfigForm;
		$this->langRepository = $langRepository;
	}

	public function actionDefault() {
		$langSession = $this->session->getSection('webLang');
		$this->webCurrentLang = $lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');

		$defaults = $this->webconfigRepository->load($lang);
		$defaults[WebconfigRepository::KEY_WEB_MUTATION] = $lang;

		$defaultsCommon = $this->webconfigRepository->load(WebconfigRepository::KEY_LANG_FOR_COMMON);
		foreach ($defaultsCommon as $key => $value) {
			$defaults[$key] = $value;
		}
		$this['configForm']->setDefaults($defaults);
	}

	/**
	 * @return Form
	 */
	public function createComponentConfigForm() {
		$form = $this->configForm->create($this->presenter, $this->webCurrentLang);
		$form->onSuccess[] = $this->saveValue;

		return $form;
	}

	/**
	 * @param string $id
	 */
	public function actionLangChange($id) {
		$langSession = $this->session->getSection('webLang');
		$langSession->langId = $id;
		$this->redirect("default");
	}

	/**
	 * @param $form
	 * @param $values
	 */
	public function saveValue($form, $values) {
		$lang = $values[WebconfigRepository::KEY_WEB_MUTATION];
		unset($values[WebconfigRepository::KEY_WEB_MUTATION]); // no more needed
		foreach ($values as $key => $value) {
			if (in_array($key, $this->LANG_DEPENDS)) {
				$this->webconfigRepository->save($key, $value, $lang);
				unset($values[$key]);
			}
		}

		$lang = WebconfigRepository::KEY_LANG_FOR_COMMON;	// its going on common parameters, no language need
		$supportedFileFormats = ["ico"];
		$fileError = false;
		foreach ($values as $key => $value) {
			if ($key == WebconfigRepository::KEY_FAVICON) {
				/** @var FileUpload $file */
				$file = $value;
				if ($file->name != "") {
					$fileController = new FileController();
					if ($fileController->upload($file, $supportedFileFormats) == false) {
						$fileError = true;
						break;
					}
					$this->webconfigRepository->save($key, $fileController->getPathDb(), $lang);
				}
			} else {
				$this->webconfigRepository->save($key, $value, $lang);
			}
		}
		if ($fileError) {
			$flashMessage = sprintf(UNSUPPORTED_UPLOAD_FORMAT, implode(",", $supportedFileFormats));
			$this->flashMessage($flashMessage, "alert-danger");
		} else {
			$this->flashMessage(WEBCONFIG_WEB_SAVE_SUCCESS, "alert-success");
		}
		$this->redirect("default");
	}

}