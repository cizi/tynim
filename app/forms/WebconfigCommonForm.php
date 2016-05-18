<?php

namespace App\Forms;

use App\Enum\WebWidthEnum;
use App\Model\LangRepository;
use App\Model\WebconfigRepository;
use Nette;

class WebconfigCommonForm extends Nette\Object {

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

	public function create() {
		$form = $this->factory->create();

		$widthSelect = new WebWidthEnum();
		$defaultValue = $widthSelect->arrayKeyValue();
		end($defaultValue);
		$form->addSelect(WebconfigRepository::KEY_WEB_WIDTH, WEBCONFIG_WEB_WIDTH, $widthSelect->arrayKeyValue())
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "1")
			->setDefaultValue(key($defaultValue));

		$form->addUpload(WebconfigRepository::KEY_FAVICON, WEBCONFIG_WEB_FAVICON)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "2");

		$form->addText(WebconfigRepository::KEY_BODY_BACKGROUND_COLOR, WEBCONFIG_WEB_BACKGROUND_COLOR)
			->setAttribute("id", "minicolorsPickerWebBg")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "3");

		$form->addCheckbox(WebconfigRepository::KEY_WEB_SHOW_MENU)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "4");

		$form->addCheckbox(WebconfigRepository::KEY_WEB_SHOW_HOME)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "5");

		$form->addText(WebconfigRepository::KEY_WEB_MENU_BG, WEBCONFIG_WEB_MENU_BACKGROUND_COLOR)
			->setAttribute("id", "minicolorsPickerMenuBg")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "6");


		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "7");

		return $form;
	}

}