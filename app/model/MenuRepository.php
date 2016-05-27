<?php

namespace App\Model;

use App\Model\Entity\MenuEntity;

class MenuRepository extends BaseRepository {

	/**
	 * @param string $lang
	 * @param int $level
	 * @return MenuEntity[]
	 */
	public function findItems($lang, $level = 1) {
		$items = [];
		$query = ["select * from menu_item as mi
			where level = %i
			and lang = %s
			order by `order`",
			$level,
			$lang
		];

		$result = $this->connection->query($query)->fetchAll();
		foreach ($result as $item) {
			$menuItem = new MenuEntity();
			$menuItem->hydrate($item->toArray());
			$menuItem->setHasSubItems($this->hasSubItems($menuItem->getId(), $lang, $level));
			$items[] = $menuItem;
		}

		return $items;
	}

	/**
	 * @param int $menuId
	 * @param string $lang
	 * @param int $level
	 * @return bool
	 */
	public function hasSubItems($menuId, $lang, $level) {
		$query = ["select * from menu_item as mi
			where submenu = %i
			and `level` = %i
			and lang = %s
			order by `order`",
			$menuId,
			$level+1,
			$lang
		];

		return (!empty($this->connection->query($query)->fetchAll()));
	}

	/**
	 * @param int $id
	 * @return \Dibi\Result|int
	 */
	public function delete($id) {
		$query = ["delete from menu_item where id = %i or submenu = %s", $id, $id];
		return $this->connection->query($query);
	}

	/**
	 * @param int $id
	 * @param int $level
	 * @param MenuEntity[] $langItems
	 */
	public function saveItem($id, $level, array $langItems) {
		$this->connection->begin();
		if ($id == null) {		// insert
			$orderValue = $this->connection->query("select ifnull(MAX(`order`),0) + 1 from menu_item");

			foreach ($langItems as $menuItem) {
				if ($this->insertNewMenuItem($menuItem, $level, $orderValue) == false) {
					$this->connection->rollback();
					return false;
				}
			}
		} else {	// update

		}
		$this->connection->commit();
		return true;
	}

	/**
	 * @param MenuEntity $menuItem
	 * @param int $level
	 * @param int $suborder
	 * @param int $submenu
	 *
	 * @return bool
	 */
	private function insertNewMenuItem(MenuEntity $menuItem, $level, $order) {
		try {
			$query = ["select * from menu_item where lang = %s and link = %s", $menuItem->getLang(), $menuItem->getLink()];
			$result = $this->connection->query($query)->fetchAll();
			if ($result) {
				throw new \Dibi\Exception("Duplicitní unikátní klíè");
			}
			$query = [
				"
				insert into menu_item values (null,%s, %s, %s, %s, %i, %i, %i)",
				$menuItem->getLang(),
				$menuItem->getLink(),
				$menuItem->getTitle(),
				$menuItem->getAlt(),
				$level,
				$order,
				$menuItem->getSubmenu()
			];
			$this->connection->query($query);
			return true;
		} catch (\Dibi\Exception $e) {
			return false;
		}
	}
}