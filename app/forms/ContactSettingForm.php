<?php

namespace App\Forms;

use App\Model\WebconfigRepository;
use Nette;
use Nette\Application\UI\Form;

class ContactSettingForm  extends Nette\Object {

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

		$form->addText(WebconfigRepository::KEY_CONTACT_FORM_TITLE, CONTACT_FORM_SETTING_BACKEND_TITLE)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "1")
			->setAttribute("placeholder", CONTACT_FORM_SETTING_BACKEND_TITLE);

		$form->addText(WebconfigRepository::KEY_CONTACT_FORM_CONTENT, CONTACT_FORM_SETTING_BACKEND_CONTENT)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "2")
			->setAttribute("id", "mceContactContent")
			->setAttribute("placeholder", CONTACT_FORM_SETTING_BACKEND_CONTENT);

		$form->addText(WebconfigRepository::KEY_CONTACT_FORM_BACKGROUND_COLOR, CONTACT_FORM_SETTING_BACKGROUND_COLOR)
			->setAttribute("id", "contactFormBackgroundColor")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "3");

		$form->addText(WebconfigRepository::KEY_CONTACT_FORM_COLOR, CONTACT_FORM_SETTING_COLOR)
			->setAttribute("id", "contactFormColor")
			->setAttribute("class", "form-control minicolors-input")
			->setAttribute("tabindex", "4");

		$form->addCheckbox(WebconfigRepository::KEY_CONTACT_FORM_ATTACHMENT)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "5");

		$form->addCheckbox(WebconfigRepository::KEY_CONTACT_FORM_IN_MENU)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "6");

		$form->addSubmit("confirm", CONTACT_FORM_SETTING_SAVE)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "7");

		return $form;
	}
}