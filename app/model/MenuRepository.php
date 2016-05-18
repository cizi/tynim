<?php

namespace App\Model;

use App\Model\Entity\MenuTopEntity;

class MenuRepository extends BaseRepository {

	/** @const for menu title in the menu */
	const KEY_MENU_TITLE = "menu_name";

	/** @const for menu url */
	const KEY_MENU_LINK = "link_name";

	/**
	 * @param MenuTopEntity $menuTopEntity
	 * @return \Dibi\Result|int
	 */
	public function saveTopMenu(MenuTopEntity $menuTopEntity) {
		if ($menuTopEntity->getId() == null) {	// insert
			$query = ["insert into menu_top", $menuTopEntity->extract()];
		} else {	// update
			$query = ["
				update menu_top set link_name = %s, menu_name = %s, order = %i",
				$menuTopEntity->getLinkName(),
				$menuTopEntity->getMenuName(),
				$menuTopEntity->getOrder()
			];
		}

		return $this->connection->query($query);
	}

	/**
	 * @return int
	 */
	public function getMaxCurrentOrderInTop() {
		$query = "select MAX(`order`) as current_max from menu_top";
		$result = $this->connection->query($query)->fetch();
		if ($result) {
			return $result->current_max;
		} else {
			return 0;
		}
	}

	/***
	 * @return MenuTopEntity[]
	 */
	public function findTopMenuItems() {
		$query = "select * from menu_top order by `order`";
		$result = $this->connection->query($query);
		$ret = [];
		foreach($result->fetchAll() as $item) {
			$menuTopEntity = new MenuTopEntity();
			$menuTopEntity->hydrate($item->toArray());
			$ret[] = $menuTopEntity;
		}

		return $ret;
	}
}