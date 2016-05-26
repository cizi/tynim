<?php

namespace App\AdminModule\Presenters;

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

	public function __construct(MenuForm $menuForm, MenuRepository $menuRepository, LangRepository $langRepository) {
		$this->menuForm = $menuForm;
		$this->menuRepository = $menuRepository;
		$this->langRepository = $langRepository;
	}

	public function actionDefault() {
		$langSession = $this->session->getSection('webLang');
		$lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');
		$this->template->topMenuEntities = $this->menuRepository->findItems($lang);
	}

	public function createComponentMenuForm() {
		$form = $this->menuForm->create($this->langRepository->findLanguages());
		$form->onSuccess[] = $this->saveMenuItem;
		return $form;
	}

	/**
	 * @param Form $form
	 * @param ArrayHash $values
	 */
	public function saveMenuItem($form, $values) {
		$level = (isset($values['level']) ? $values['level'] : 1);
		$editedId = (isset($values['id']) ? $values['id'] : null);

		$langItems = [];
		foreach ($values as  $item) {
			if ($item instanceof ArrayHash) {
				$menuEntity = new MenuEntity();
				$menuEntity->hydrate((array)$item);
				$langItems[] = $menuEntity;
			}
		}
		$this->menuRepository->saveItem($editedId, $level, $langItems);
		$this->flashMessage(MENU_SETTINGS_ITEM_LINK_ADDED, "alert-success");
		$this->redirect("default");
	}

	/**
	 * @param $id
	 */
	public function actionEdit($id) {

	}
}