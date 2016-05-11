<?php

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Security\User;

class SignForm extends Nette\Object {

	/** @var FormFactory */
	private $factory;

	/** @var User */
	private $user;

	public function __construct(FormFactory $factory, User $user) {
		$this->factory = $factory;
		$this->user = $user;
	}

	/**
	 * @return Form
	 */
	public function create() {
		$form = $this->factory->create();
		$form->addText('login', ADMIN_LOGIN_EMAIL)
			->setAttribute("placeholder", ADMIN_LOGIN_EMAIL_PLACEHOLDER)
			->setAttribute("type", "email")
			->setAttribute("id", "inputEmail")
			->setAttribute("class", "form-control")
			->setAttribute("required", "required")
			->setAttribute("autofocus", "autofocus")
			->setRequired(ADMIN_LOGIN_EMAIL_REQ);

		$form->addPassword('password', ADMIN_LOGIN_PASS)
			->setAttribute("placeholder", ADMIN_LOGIN_PASS_PLACEHOLDER)
			->setAttribute("type", "password")
			->setAttribute("id", "inputPassword")
			->setAttribute("class", "form-control")
			->setAttribute("required", "required")
			->setRequired(ADMIN_LOGIN_PASS_REQ);

		$form->addCheckbox('remember', ADMIN_LOGIN_REMEMBER_ME);

		$form->addSubmit('send', ADMIN_LOGIN_LOGIN)
			->setAttribute("class", "btn btn-lg btn-primary btn-block");

		return $form;
	}
}
