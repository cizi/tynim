<?php

namespace App\AdminModule\Presenters;

use App\Forms\MenuForm;
use App\Model\Entity\MenuTopEntity;
use App\Model\MenuRepository;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

class MenuPresenter extends SignPresenter {

	/** @var MenuPresenter  */
	private $menuForm;

	/** @var MenuRepository  */
	private $menuRepository;

	public function __construct(MenuForm $menuForm, MenuRepository $menuRepository) {
		$this->menuForm = $menuForm;
		$this->menuRepository = $menuRepository;
	}

	public function actionDefault() {
		$this->template->topMenuEntities = $this->menuRepository->findTopMenuItems();
	}

	public function createComponentMenuForm() {
		$form = $this->menuForm->create();
		$form->onSuccess[] = $this->saveTopMenu;
		return $form;
	}

	/**
	 * @param Form $form
	 * @param ArrayHash $values
	 */
	public function saveTopMenu($form, $values) {
		$menuTopEntity = new MenuTopEntity();
		$menuTopEntity->hydrate((array)$values);
		if ($menuTopEntity->getMenuName() != "" && $menuTopEntity->getLinkName() != "") {	// save just filled things
			$menuTopEntity->setOrder($this->menuRepository->getMaxCurrentOrderInTop() + 1);
			$this->menuRepository->saveTopMenu($menuTopEntity);
		}
		$this->flashMessage(MENU_SETTINGS_ITEM_LINK_ADDED, "alert-success");
		$this->redirect("default");
	}
}