<?php

namespace App\FrontendModule\Presenters;

use App\Model\LangRepository;
use Nette;
use Nette\Application\UI\Presenter;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {

	/** @var LangRepository */
	private $langRepository;

	/**
	 * @param LangRepository $langRepository
	 */
	public function injectBaseSettings(LangRepository $langRepository) {
		$this->langRepository = $langRepository;
	}

	public function startup() {
		parent::startup();

		// language setting
		$lang = $this->langRepository->getCurrentLang($this->session);
		if (!isset($lang) || $lang == "") {
			$this->langRepository->switchToLanguage($this->session);
		}
		$this->langRepository->loadLanguageMutation($lang);
	}
}
