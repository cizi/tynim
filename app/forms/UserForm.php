<?php

namespace App\Forms;

use App\Enum\UserRoleEnum;
use Nette;
use Nette\Application\UI\Form;

class UserForm extends Nette\Object {

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
	public function create(Nette\Application\UI\Presenter $presenter) {
		$form = $this->factory->create();

		$form->addText("email", USER_EDIT_EMAIL_LABEL)
			->setAttribute("type","email")
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", USER_EDIT_EMAIL_LABEL)
			->setRequired(USER_EDIT_EMAIL_REQ)
			->addRule(Form::EMAIL, USER_EDIT_EMAIL_VALIDATION);

		$form->addPassword("password", USER_EDIT_PASS_LABEL)
			->setAttribute("type","password")
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", USER_EDIT_EMAIL_LABEL)
			->setRequired(USER_EDIT_PASS_REQ);

		$form->addPassword("passwordConfirm", USER_EDIT_PASS_AGAIN_LABEL)
			->setAttribute("type","password")
			->setAttribute("class", "form-control")
			->setAttribute("placeholder", USER_EDIT_PASS_AGAIN_LABEL)
			->setRequired(USER_EDIT_PASS_AGAIN_LABEL);

		$userRole = new UserRoleEnum();
		$form->addSelect("userRole", USER_EDIT_ROLE_LABEL, $userRole->translatedForSelect())
			->setAttribute("class", "form-control");

		$form->addCheckbox('active')
			->setAttribute("checked")
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50");

		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary");

		$link = new Nette\Application\UI\Link($presenter, "User:Default", []);
		$form->addButton("back", USER_EDIT_BACK_BTN_LABEL)
			->setAttribute("class", "btn btn-secondary")
			->setAttribute("onclick", "location.assign('". $link ."')");

		return $form;
	}

}
