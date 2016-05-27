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
	 *
	 * @return bool
	 */
	public function delete($id) {
		$this->connection->begin();
		try {
			$idToDelete = [];
			// delete both top menu items
			$query = ["select `order` from menu_item where id = %i", $id];
			$result = $this->connection->query($query)->fetch();
			$topOrder = $result->toArray()['order'];

			$query = ["select id from menu_item where `order` = %i", $topOrder];
			foreach($this->connection->query($query)->fetchAll() as $item) {
				$idToDelete[] = $item->toArray()['id'];
			}

			// checking another id to delete
			$query = ["select id from menu_item where submenu in %in", $idToDelete];
			do {
				$nextId = [];
				foreach ($this->connection->query($query)->fetchAll() as $item) {
					$idToDelete[] = $item->toArray()['id'];
					$nextId[] = $item->toArray()['id'];
				}
				$query = ["select id from menu_item where submenu in %in", $nextId];
			} while (count($this->connection->query($query)->fetchAll()));

			$query = ["delete from menu_item where id in %in or submenu in %in", $idToDelete, $idToDelete];
			$this->connection->query($query);
		} catch (\Exception $e) {
			$this->connection->rollback();
			return false;
		}

		$this->connection->commit();
		return true;
	}

	/**
	 * @param MenuEntity[] $langItems
	 */
	public function saveItem(array $langItems) {
		$this->connection->begin();

		$orderValue = $this->connection->query("select ifnull(MAX(`order`),0) + 1 from menu_item");
		foreach ($langItems as $menuItem) {
			if (empty($menuItem->getId())) {// insert
				if ($this->insertNewMenuItem($menuItem, $orderValue) == false) {
					$this->connection->rollback();
					return false;
				}
			} else {	// update
				$this->updateMenuItem($menuItem);
			}
		}

		$this->connection->commit();
		return true;
	}

	/**
	 * @param int $id
	 * @return MenuEntity[]
	 */
	public function findForEditById($id) {
		$query = ["select `order` from menu_item where id = %i", $id];
		$result = $this->connection->query($query)->fetch();
		$menuEntity = new MenuEntity();
		$menuEntity->hydrate($result->toArray());

		$query = ["select * from menu_item where `order` = %i", $menuEntity->getOrder()];
		$result = $this->connection->query($query)->fetchAll();
		$menuEntities = [];
		foreach ($result as $item) {
			$menuEnt = new MenuEntity();
			$menuEnt->hydrate($item->toArray());
			$menuEntities[] = $menuEnt;
		}

		return $menuEntities;
	}

	/**
	 * @param MenuEntity $menuItem
	 * @param int $level
	 * @param int $suborder
	 * @param int $submenu
	 *
	 * @return bool
	 */
	private function insertNewMenuItem(MenuEntity $menuItem, $order) {
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
				$menuItem->getLevel(),
				$order,
				$menuItem->getSubmenu()
			];
			$this->connection->query($query);
			return true;
		} catch (\Dibi\Exception $e) {
			return false;
		}
	}

	/**
	 * @param MenuEntity $menuItemEntity
	 */
	private function updateMenuItem(MenuEntity $menuItemEntity) {
		$query = ["update menu_item set
				link = %s,
				title = %s,
				alt = %s
		 	where id = %i",
			$menuItemEntity->getLink(),
			$menuItemEntity->getTitle(),
			$menuItemEntity->getAlt(),
			$menuItemEntity->getId()
		];

		$this->connection->query($query);
	}
}