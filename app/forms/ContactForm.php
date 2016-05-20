<?php

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;

class ContactForm extends Nette\Object {

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

		$form->addText("name")
			->setAttribute("tabindex", "1")
			->setAttribute("class", "tinym_required_field form-control")
			->setAttribute("placeholder", CONTACT_FORM_NAME)
			->setAttribute("validation", CONTACT_FORM_NAME_REQ);

		$form->addText("contactEmail")
			->setAttribute("type","email")
			->setAttribute("tabindex", "2")
			->setAttribute("class", "tinym_required_field form-control")
			->setAttribute("placeholder", CONTACT_FORM_EMAIL)
			->setAttribute("validation", CONTACT_FORM_EMAIL_REQ);

		$form->addText("subject")
			->setAttribute("tabindex", "3")
			->setAttribute("class", "tinym_required_field form-control")
			->setAttribute("placeholder", CONTACT_FORM_SUBJECT)
			->setAttribute("validation", CONTACT_FORM_SUBJECT_REQ);

		$form->addUpload("attachment")
			->setAttribute("tabindex", "4")
			->setAttribute("placeholder", CONTACT_FORM_ATTACHMENT)
			->setAttribute("class", "form-control");

		$form->addTextArea("text", null, 50, 100)
			->setAttribute("tabindex", "5")
			->setAttribute("placeholder", CONTACT_FORM_TEXT)
			->setAttribute("validation", CONTACT_FORM_TEXT_REQ)
			->setAttribute("class", "tinym_required_field form-control");

		$form->addSubmit("confirm")
			->setAttribute("tabindex", "6")
			->setAttribute("class","btn btn-primary");

		return $form;
	}
}