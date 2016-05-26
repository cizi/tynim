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
	 * @param array $languages
	 * @param int $id
	 * @param int $level
	 * @return Form
	 */
	public function create(array $languages, $id = null, $level = 1) {
		$counter = 1;
		$form = $this->factory->create();

		foreach($languages as $lang) {
			$container = $form->addContainer($lang);

			$container->addText("lang")
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", "-1")
				->setAttribute("readonly", "readonly")
				->setValue($lang);

			$container->addText("title", MENU_SETTINGS_ITEM_NAME)
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", $counter + 1);

			$container->addText("link", MENU_SETTINGS_ITEM_LINK)
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", $counter + 2);

			$container->addText("alt", MENU_SETTINGS_ITEM_SEO)
				->setAttribute("class", "form-control menuItem")
				->setAttribute("tabindex", $counter + 3);

			$counter += 3;
		}
		if (!empty($id)) {
			$form->addHidden("id")
				->setValue($id);
		}

		$form->addHidden("level")
			->setValue($level);

		$form->addSubmit("confirm", USER_EDIT_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary menuItem alignRight")
			->setAttribute("tabindex", $counter+1);

		return $form;
	}
}