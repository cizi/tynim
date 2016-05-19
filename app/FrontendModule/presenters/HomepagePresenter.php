<?php

namespace App\FrontendModule\Presenters;

use Nette;
use App\Enum\WebWidthEnum;
use App\Model\SliderSettingRepository;
use App\Model\SliderPicRepository;
use App\Model\WebconfigRepository;
use App\FrontendModule\Presenters;

class HomepagePresenter extends BasePresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var SliderSettingRepository */
	private $sliderSettingRepository;

	/** var SliderPicRepository */
	private $sliderPicRepository;

	public function __construct(
		WebconfigRepository $webconfigRepository,
		SliderSettingRepository $sliderSettingRepository,
		SliderPicRepository $sliderPicRepository
	) {
		$this->webconfigRepository = $webconfigRepository;
		$this->sliderSettingRepository = $sliderSettingRepository;
		$this->sliderPicRepository = $sliderPicRepository;
	}

	/**
	 * data init for settings values in template
	 */
	public function startup() {
		parent::startup();
		$this->loadWebConfig();
		$this->loadSliderConfig();
	}

	public function renderDefault() {

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
}
