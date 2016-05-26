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
		$query = ["select * from menu as m left join menu_item as mi
			on m.id = mi.menu_id
			where mi.level = %i
			and lang = %s
			order by m.order",
			$level,
			$lang
		];

		$result = $this->connection->query($query)->fetchAll();
		foreach ($result as $item) {
			$menuItem = new MenuEntity();
			$menuItem->hydrate($item->toArray());
			$items[] = $menuItem;
		}

		return $items;
	}

	/**
	 * @param int $id
	 * @param int $level
	 * @param MenuEntity[] $langItems
	 * @param int $suborder
	 */
	public function saveItem($id, $level, array $langItems, $suborder = 0) {
		$this->connection->begin();
		if ($id == null) {		// insert
			$orderValue = $this->connection->query("select ifnull(MAX(`order`),0) + 1 from menu");
			$query = ["insert into menu values (null, %i)", $orderValue];
			$result = $this->connection->query($query);
			$id = $this->connection->insertId();

			foreach ($langItems as $menuItem) {
				if ($this->insertNewMenuItem($id, $menuItem, $level, $suborder) == false) {
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
	 * @param int $id
	 * @param MenuEntity $menuItem
	 * @param int $level
	 * @param int $suborder
	 *
	 * @return bool
	 */
	private function insertNewMenuItem($id, MenuEntity $menuItem, $level, $suborder) {
		try {
			$query = ["select * from menu_item where lang = %s and link = %s", $menuItem->getLang(), $menuItem->getLink()];
			$result = $this->connection->query($query)->fetchAll();
			if ($result) {
				throw new \Dibi\Exception("Duplicitní unikátní klíè");
			}
			$query = [
				"
				insert into menu_item values (%i, %s, %s, %s, %s, %i, %i)",
				$id,
				$menuItem->getLang(),
				$menuItem->getLink(),
				$menuItem->getTitle(),
				$menuItem->getAlt(),
				$level,
				$suborder
			];
			$this->connection->query($query);
			return true;
		} catch (\Dibi\Exception $e) {
			return false;
		}
	}
}