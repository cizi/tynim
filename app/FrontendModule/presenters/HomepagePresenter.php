<?php

namespace App\FrontendModule\Presenters;

use App\Enum\WebWidthEnum;
use App\Model\WebconfigRepository;
use Nette;
use App\FrontendModule\Presenters;

class HomepagePresenter extends BasePresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/**
	 * @param WebconfigRepository $webconfigRepository
	 */
	public function __construct(WebconfigRepository $webconfigRepository) {
		$this->webconfigRepository = $webconfigRepository;
	}

	/**
	 * data init for settings values in template
	 */
	public function startup() {
		parent::startup();
		$langSession = $this->session->getSection('webLang');
		$lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');

		$widthEnum = new WebWidthEnum();
		$this->template->title = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_TITLE, $lang);
		$this->template->googleAnalytics = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_GOOGLE_ANALYTICS, $lang);
		$this->template->favicon = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_FAVICON, $lang);
		$this->template->bodyWidth = $widthEnum->getValueByKey($this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_WIDTH, $lang));
		$this->template->bodyBackgroundColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_BODY_BACKGROUND_COLO, $lang);
		$this->template->webKeywords = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_KEYWORDS, $lang);
	}

	public function renderDefault() {
		$this->template->anyVariable = 'any value';
	}

}
