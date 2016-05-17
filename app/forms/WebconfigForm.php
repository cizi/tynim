<?php

namespace App\Forms;

use App\Enum\WebWidthEnum;
use App\Model\LangRepository;
use App\Model\WebconfigRepository;
use Nette;

class WebconfigForm extends Nette\Object {

	/** @var FormFactory */
	private $factory;

	/** @var LangRepository */
	private $langRepository;

	/**
	 * @param FormFactory $factory
	 * @param LangRepository $langRepository
	 */
	public function __construct(FormFactory $factory, LangRepository $langRepository) {
		$this->factory = $factory;
		$this->langRepository = $langRepository;
	}

	public function create(Nette\Application\UI\Presenter $presenter) {
		$form = $this->factory->create();

		$link = new Nette\Application\UI\Link($presenter, "Webconfig:LangChange", []);
		$form->addSelect(WebconfigRepository::KEY_WEB_MUTATION, WEBCONFIG_WEBMUTATION, $this->langRepository->findLanguages())
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "2")
			->setAttribute("id", "languageSwitcher")
			->setAttribute("onchange", "langChangeRedir('". $link . "')");

		$form->addText(WebconfigRepository::KEY_WEB_TITLE, WEBCONFIG_WEB_NAME)
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", WEBCONFIG_WEB_NAME)
			->setAttribute("tabindex", "1");

		$form->addText(WebconfigRepository::KEY_WEB_KEYWORDS, WEBCONFIG_WEB_KEYWORDS)
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", WEBCONFIG_WEB_KEYWORDS)
			->setAttribute("tabindex", "1");

		$widthSelect = new WebWidthEnum();
		$defaultValue = $widthSelect->arrayKeyValue();
		end($defaultValue);
		$form->addSelect(WebconfigRepository::KEY_WEB_WIDTH, WEBCONFIG_WEB_WIDTH, $widthSelect->arrayKeyValue())
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "2")
			->setDefaultValue(key($defaultValue));

		$form->addUpload(WebconfigRepository::KEY_FAVICON, WEBCONFIG_WEB_FAVICON)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "3");

		$form->addTextArea(WebconfigRepository::KEY_WEB_GOOGLE_ANALYTICS, WEBCONFIG_WEB_GOOGLE_ANALYTICS, null, 8)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "4");

		$form->addText(WebconfigRepository::KEY_BODY_BACKGROUND_COLOR, WEBCONFIG_WEB_BACKGROUND_COLOR)
			->setAttribute("id", "minicolorsPicker")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "5");


		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "6");

		return $form;
	}

}