<?php

namespace App\AdminModule\Controller;

use App\Model\Entity\MenuEntity;
use App\Model\MenuRepository;
use Nette\Application\UI\Link;
use Nette\Application\UI\Presenter;

class MenuController {

	/** @var MenuRepository  */
	private $menuRepository;

	public function __construct(MenuRepository $menuRepository) {
		$this->menuRepository = $menuRepository;
	}

	/**
	 * Recursively menu rendering
	 *
	 * @param Presenter $presenter
	 * @param MenuEntity[] $menuEntities
	 * @return string
	 */
	public function renderMenuItemWithSubItems(Presenter $presenter, $menuEntities) {
		$tableData = "";
		/** @var MenuEntity $menuEntity */
		foreach ($menuEntities as $menuEntity) {
			$moveOrderUpLink = "";
			$moveOrderDownLink = "";
			$linkAddSubmenu = new Link($presenter, "Menu:Edit", [$menuEntity->getId(), null, $menuEntity->getLevel() + 1]);
			$linkEdit = new Link($presenter, "Menu:Edit", [$menuEntity->getId()]);
			$linkDelete = new Link($presenter, "Menu:Delete", [$menuEntity->getId()]);

			$prefix = "";
			for ($i=1; $i<$menuEntity->getLevel(); $i++) {
				$prefix .= " - ";
			}

			$tableData .= "
				<tr>
					<td>{$prefix}{$menuEntity->getOrder()}</td>
					<td>{$menuEntity->getTitle()}</td>
					<td>{$menuEntity->getLink()}</td>
					<td>{$menuEntity->getAlt()}</td>
					<td class='alignRight'>
						<a href='{$moveOrderUpLink}' title='" . MENU_SETTINGS_MOVE_ITEM_UP . "'><span class='glyphicon glyphicon-chevron-up colorGrey'></span></a> &nbsp;&nbsp;
						<a href='{$moveOrderDownLink}' title='" . MENU_SETTINGS_MOVE_ITEM_DOWN . "'><span class='glyphicon glyphicon-chevron-down colorGrey'></span></a> &nbsp;&nbsp;
						<a href='{$linkAddSubmenu}' title='" . MENU_SETTINGS_ADD_SUBITEM . "'><span class='glyphicon glyphicon-plus colorGreen'></span></a> &nbsp;&nbsp;
						<a href='{$linkEdit}' title='" . MENU_SETTINGS_EDIT_ITEM . "'}><span class='glyphicon glyphicon-pencil'></span></a> &nbsp;&nbsp;
						<a href='#' data-href='{$linkDelete}' class='colorRed' data-toggle='modal' data-target='#confirm-delete' title='" . MENU_SETTINGS_MENU_TOP_DELETE . "'><span class='glyphicon glyphicon-remove'></span></a>
					</td>
				</tr>
				";

			if ($menuEntity->hasSubItems()) {
				$anotherEntities = $this->menuRepository->findItems($menuEntity->getLang(), $menuEntity->getLevel() + 1);
				$tableData .= $this->renderMenuItemWithSubItems($presenter, $anotherEntities);
			}
		}

		return $tableData;
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function prepareMenuItemsForEdit($id) {
		$menuItemsForEdit = $this->menuRepository->findForEditById($id);
		$level = "";
		$submenu = "";
		$result = [];
		foreach ($menuItemsForEdit as $menuItem) {
			$level = $menuItem->getLevel();
			$submenu = $menuItem->getSubmenu();

			$result[$menuItem->getLang()] = [
				'title' => $menuItem->getTitle(),
				'link' => $menuItem->getLink(),
				'alt' => $menuItem->getAlt(),
				'id' => $menuItem->getId()
			];
		}
		$result['level'] = $level;
		$result['submenu'] = $submenu;

		return $result;
	}

}