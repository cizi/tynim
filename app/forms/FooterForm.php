<?php

namespace App\Forms;

use App\Model\WebconfigRepository;
use Nette;
use Nette\Application\UI\Form;

class FooterForm extends Nette\Object {

	/** @var FormFactory */
	private $factory;

	/**
	 * @param FormFactory $factory
	 */
	public function __construct(FormFactory $factory) {
		$this->factory = $factory;
	}

	/**
	 * @return Form
	 */
	public function create() {
		$form = $this->factory->create();

		$form->addText(WebconfigRepository::KEY_FOOTER_BACKGROUND_COLOR, CONTACT_FORM_SETTING_COLOR)
			->setAttribute("id", "footerBackgroundColor")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "1");

		$form->addText(WebconfigRepository::KEY_FOOTER_COLOR, CONTACT_FORM_SETTING_COLOR)
			->setAttribute("id", "footerColor")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "2");

		$form->addCheckbox(WebconfigRepository::KEY_SHOW_CONTACT_FORM_IN_FOOTER)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "3");

		$form->addTextArea(WebconfigRepository::KEY_FOOTER_CONTENT, FOOTER_CONTENT)
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", FOOTER_CONTENT)
			->setAttribute("id", "mceFooterContent")
			->setAttribute("tabindex", "4");

		$form->addMultiUpload(WebconfigRepository::KEY_FOOTER_FILES)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "5");

		$form->addSubmit("confirm", FOOTER_BUTTON_SAVE)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "6");

		return $form;
	}

}