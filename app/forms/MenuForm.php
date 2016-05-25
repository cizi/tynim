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
	public function create(array $languages, $subItem = false) {
		$form = $this->factory->create();

		$form->addCheckbox('hasSubMenu', "  " . MENU_SETTINGS_SUBMENU)
			->setAttribute("data-toggle", "toggle")
			->setAttribute("data-height", "25")
			->setAttribute("data-width", "50")
			->setDefaultValue("checked")
			->setAttribute("tabindex", "1")
			->setAttribute("class", "menuItem");


		$counter = 1;
		foreach($languages as $lang) {
			$container = $form->addContainer($lang);

			$container->addText("langPointer")
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", "-1")
				->setAttribute("readonly", "readonly")
				->setValue($lang);


			$container->addText(MenuRepository::KEY_MENU_TITLE, MENU_SETTINGS_ITEM_NAME)
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", $counter + 2);

			$container->addText(MenuRepository::KEY_MENU_LINK, MENU_SETTINGS_ITEM_LINK)
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", $counter + 3);

			$container->addHidden("lang")
				->setValue($lang);

			$counter += 4;
		}

		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary menuItem alignRight")
			->setAttribute("tabindex", $counter+1);

		return $form;
	}
}