<?php

namespace App\Forms;

use App\Model\MenuRepository;
use Nette;
use Nette\Application\UI\Form;

class MenuForm extends Nette\Object {

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
	public function create($subItem = false) {
		$form = $this->factory->create();

		$form->addText(MenuRepository::KEY_MENU_TITLE, MENU_SETTINGS_ITEM_NAME)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "2");

		$form->addText(MenuRepository::KEY_MENU_LINK, MENU_SETTINGS_ITEM_LINK)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "3");

		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "4");

		return $form;
	}
}