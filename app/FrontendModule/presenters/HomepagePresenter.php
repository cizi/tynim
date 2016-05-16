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

		$widthEnum = new WebWidthEnum();
		$this->template->title = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_TITLE);
		$this->template->googleAnalytics = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEG_GOOGLE_ANALYTICS);
		$this->template->favicon = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_FAVICON);
		$this->template->bodyWidth = $widthEnum->getValueByKey($this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_WIDTH));
		$this->template->bodyBackgroundColor = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_BODY_BACKGROUND_COLOR);
	}

	public function renderDefault() {
		$this->template->anyVariable = 'any value';
	}

}
