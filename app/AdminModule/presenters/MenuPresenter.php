<?php

namespace App\AdminModule\Presenters;

use App\AdminModule\Controller\MenuController;
use App\Forms\MenuForm;
use App\Model\Entity\MenuEntity;
use App\Model\LangRepository;
use App\Model\MenuRepository;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

class MenuPresenter extends SignPresenter {

	/** @var MenuPresenter  */
	private $menuForm;

	/** @var MenuRepository  */
	private $menuRepository;

	/** @var LangRepository */
	private $langRepository;

	/** @var MenuController */
	private $menuController;

	public function __construct(
		MenuForm $menuForm,
		MenuRepository $menuRepository,
		LangRepository $langRepository,
		MenuController $menuController
	) {
		$this->menuForm = $menuForm;
		$this->menuRepository = $menuRepository;
		$this->langRepository = $langRepository;
		$this->menuController = $menuController;
	}

	public function actionDefault() {
		$langSession = $this->session->getSection('webLang');
		$lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');
		$this->template->topMenuEntities = $this->menuRepository->findItems($lang);
		$this->template->menuController = $this->menuController;
		$this->template->presenter = $this->presenter;
	}

	public function createComponentMenuForm() {
		$form = $this->menuForm->create($this->langRepository->findLanguages());
		$form->onSuccess[] = $this->saveMenuItem;
		return $form;
	}

	/**
	 * @param int $id
	 */
	public function actionDelete($id) {
		$this->menuRepository->delete($id);
		$this->flashMessage(MENU_SETTINGS_ITEM_DELETED, "alert-success");
		$this->redirect("default");
	}

	/**
	 * @param Form $form
	 * @param ArrayHash $values
	 */
	public function saveMenuItem($form, $values) {
		$level = (isset($values['level']) ? $values['level'] : 1);
		$editedId = (isset($values['id']) ? $values['id'] : null);
		$submenu = (isset($values['submenu']) ? $values['submenu'] : 0);

		$langItems = [];
		foreach ($values as  $item) {
			if ($item instanceof ArrayHash) {
				$menuEntity = new MenuEntity();
				$menuEntity->hydrate((array)$item);
				$menuEntity->setSubmenu($submenu);
				$langItems[] = $menuEntity;
			}
		}
		if ($this->menuRepository->saveItem($editedId, $level, $langItems)) {
			$this->flashMessage(MENU_SETTINGS_ITEM_LINK_ADDED, "alert-success");
			$this->redirect("default");
		} else {
			$this->flashMessage(MENU_SETTINGS_ITEM_LINK_FAILED, "alert-danger");
			$this->redirect("edit", null, $values);
		}

	}

	/**
	 * @param $id
	 */
	public function actionEdit($id, array $values = null, $level = null) {
		if (!empty($values)) {	// edit mode
			$this['menuForm']->setDefaults($values);
		}

		if ($level != null) {	// submenu mode
			$this['menuForm']['level']->setValue($level);
			$this['menuForm']['submenu']->setValue($id);
		}

	}
}