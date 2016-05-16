<?php

namespace App\FrontendModule\Presenters;

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
		$this->template->title = $this->webconfigRepository->getByKey(WebconfigRepository::KEY_WEB_TITLE);
	}

	public function renderDefault() {
		$this->template->anyVariable = 'any value';
	}

}
