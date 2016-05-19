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
			->setAttribute("tabindex", "1")
			->setAttribute("id", "languageSwitcher")
			->setAttribute("onchange", "langChangeRedir('". $link . "')");

		$form->addText(WebconfigRepository::KEY_WEB_TITLE, WEBCONFIG_WEB_NAME)
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", WEBCONFIG_WEB_NAME)
			->setAttribute("tabindex", "2");

		$form->addText(WebconfigRepository::KEY_WEB_KEYWORDS, WEBCONFIG_WEB_KEYWORDS)
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", WEBCONFIG_WEB_KEYWORDS)
			->setAttribute("tabindex", "3");

		$form->addTextArea(WebconfigRepository::KEY_WEB_GOOGLE_ANALYTICS, WEBCONFIG_WEB_GOOGLE_ANALYTICS, null, 8)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "4");

		$widthSelect = new WebWidthEnum();
		$defaultValue = $widthSelect->arrayKeyValue();
		end($defaultValue);
		$form->addSelect(WebconfigRepository::KEY_WEB_WIDTH, WEBCONFIG_WEB_WIDTH, $widthSelect->arrayKeyValue())
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "5")
			->setDefaultValue(key($defaultValue));

		$form->addUpload(WebconfigRepository::KEY_FAVICON, WEBCONFIG_WEB_FAVICON)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "6");

		$form->addText(WebconfigRepository::KEY_BODY_BACKGROUND_COLOR, WEBCONFIG_WEB_BACKGROUND_COLOR)
			->setAttribute("id", "minicolorsPickerWebBg")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "7");

		$form->addCheckbox(WebconfigRepository::KEY_WEB_SHOW_MENU)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "8");

		$form->addCheckbox(WebconfigRepository::KEY_WEB_SHOW_HOME)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "9");

		$form->addText(WebconfigRepository::KEY_WEB_MENU_BG, WEBCONFIG_WEB_MENU_BACKGROUND_COLOR)
			->setAttribute("id", "minicolorsPickerMenuBg")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "10");

		$form->addText(WebconfigRepository::KEY_WEB_MENU_LINK_COLOR, WEBCONFIG_WEB_MENU_LINK_COLOR)
			->setAttribute("id", "minicolorsPickerMenuLink")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "11");

		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "12");

		return $form;
	}

}