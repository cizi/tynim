<?php

namespace App\Forms;

use App\Enum\WebWidthEnum;
use Nette;

class WebconfigForm extends Nette\Object {

	const FILE_FAVICON = "WEB_FAVICON";

	/** @var FormFactory */
	private $factory;

	/**
	 * @param FormFactory $factory
	 */
	public function __construct(FormFactory $factory) {
		$this->factory = $factory;
	}

	public function create() {
		$form = $this->factory->create();
		$form->addText("WEB_TITLE", WEBCONFIG_WEB_NAME)
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", WEBCONFIG_WEB_NAME)
			->setAttribute("tabindex", "1");


		$widthSelect = new WebWidthEnum();
		$defaultValue = $widthSelect->arrayKeyValue();
		end($defaultValue);
		$form->addSelect("WEB_WIDTH", WEBCONFIG_WEB_WIDTH, $widthSelect->arrayKeyValue())
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "2")
			->setDefaultValue(key($defaultValue));

		$form->addUpload(self::FILE_FAVICON, WEBCONFIG_WEB_FAVICON)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "3");

		$form->addTextArea("WEG_GOOGLE_ANALYTICS", WEBCONFIG_WEB_GOOGLE_ANALYTICS, null, 8)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "4");

		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "6");

		return $form;
	}

}