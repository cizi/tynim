<?php

namespace App\Model;

use App\Model\Entity\BlockContentEntity;
use App\Model\Entity\BlockEntity;
use App\Model\Entity\BlockPicsEntity;
use App\Model\Entity\PageContentEntity;

class BlockRepository extends BaseRepository {

	/** @const for width (name of column in DB as well) */
	const KEY_WIDTH = "width";

	/** @const for font color (name of column in DB as well) */
	const KEY_COLOR = "color";

	/** @const for background color (name of column in DB as well) */
	const KEY_BACKGROUND_COLOR = "background_color";

	/** @const for content lang (name of column in DB as well) */
	const KEY_CONTENT_LANG = "lang";

	/** @const for contetn (name of column in DB as well) */
	const KEY_CONTENT = "content";

	/** @var MenuRepository */
	private $menuRepository;

	/**
	 * @param MenuRepository $menuRepository
	 */
	public function	__construct(\Dibi\Connection $connection, MenuRepository $menuRepository) {
		parent::__construct($connection);
		$this->menuRepository = $menuRepository;
	}

	/**
	 * @param string $lang
	 * @return BlockEntity[]
	 */
	public function findBlockList($lang) {
		$query = ["
			select b.id as id, b.background_color, b.color, b.width, bc.lang, bc.content
			from block as b left join block_content as bc on b.id = bc.block_id where lang = %s",
			$lang
		];

		$result = $this->connection->query($query)->fetchAll();
		$blocks = [];
		foreach ($result as $item) {
			$blockContentEntity = new BlockContentEntity();
			$blockContentEntity->hydrate($item->toArray());

			$blockEntity = new BlockEntity();
			$blockEntity->hydrate($item->toArray());
			$blockEntity->setBlockContent($blockContentEntity);

			$blocks[] = $blockEntity;
		}

		return $blocks;
	}

	/**
	 * @param int $id
	 * @return BlockPicsEntity[]
	 */
	public function findBlockPictures() {
		$query = ["select * from block_pic"];
		$result = $this->connection->query($query)->fetchAll();

		$pics = [];
		foreach ($result as $item) {
			$blockPicEntity = new BlockPicsEntity();
			$blockPicEntity->hydrate($item->toArray());
			$pics[] = $blockPicEntity;
		}

		return $pics;
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deleteBlockItem($id) {
		$this->connection->begin();
		try {
			$query = ["delete from block_content where block_id = %i", $id];
			$this->connection->query($query);
			$query = ["delete from block where id = %i", $id];
			$this->connection->query($query);
		} catch (\Exception $e) {
			$this->connection->rollback();
			return false;
		}

		$this->connection->commit();
		return true;
	}

	/**
	 * @param BlockEntity $blockEntity
	 * @param array $blockContentEntities
	 * @param array $blockPicsEntities
	 * @return bool
	 */
	public function saveCompleteBlockItem(
		BlockEntity $blockEntity,
		array $blockContentEntities,
		array $blockPicsEntities = []
	) {
		$this->connection->begin();
		try {
			$blockId = $this->saveBlockEntity($blockEntity);
			if (empty($blockId)) {
				throw new \Exception("Block ID is missing.");
			}
			$this->saveBlockContents($blockContentEntities, $blockId);
			$this->savePics($blockPicsEntities);
		} catch (\Exception $e) {
			$this->connection->rollback();
			return false;
		}

		$this->connection->commit();
		return true;
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function getEditArray($id) {
		$query = ["select * from block where id = %i", $id];
		$return = $this->connection->query($query)->fetch()->toArray();

		$query = ["select * from block_content where block_id = %i", $id];
		$result = $this->connection->query($query)->fetchAll();
		foreach($result as $langItem) {
			$blockContentEntity = new BlockContentEntity();
			$blockContentEntity->hydrate($langItem->toArray());
			$return[$blockContentEntity->getLang()] = $blockContentEntity->extract();
		}

		return $return;
	}

	/**
	 * @param int $idMenu
	 * @param int $idBlock
	 *
	 */
	public function savePageContent($idMenu, $idBlock) {
		$query = ["select max(`order`) from page_content where menu_item_id = %i", $idMenu];
		$result = $this->connection->query($query)->fetchSingle();

		$menuItemEntity = $this->menuRepository->getMenuEntityById($idMenu);
		$allLangsMenuItems = $this->menuRepository->findItemsByOrder($menuItemEntity->getOrder());

		$newOrder =(int)$result + 1;
		foreach($allLangsMenuItems as $menuItem) {
			$pageContent = new PageContentEntity();
			$pageContent->setMenuItemId($menuItem->getId());
			$pageContent->setBlockId($idBlock);
			$pageContent->setOrder($newOrder);

			$query = ["insert into page_content", $pageContent->extract()];
			$this->connection->query($query);
		}
	}

	/**
	 * @param int $idMenu
	 * @param int $idBlock
	 */
	public function deletePageContent($idMenu, $idBlock) {
		$menuItemEntity = $this->menuRepository->getMenuEntityById($idMenu);
		$allLangsMenuItems = $this->menuRepository->findItemsByOrder($menuItemEntity->getOrder());

		foreach($allLangsMenuItems as $menuItem) {
			$query = ["
				delete from page_content where menu_item_id = %i and block_id = %i",
				$menuItem->getId(),
				$idBlock
			];
			$this->connection->query($query);
		}
	}

	/**
	 * @param int $idMenu
	 * @param int $idBlock
	 * @param bool $moveUp indicates direction of moving
	 */
	public function movePageContent($idMenu, $idBlock, $moveUp = true) {
		$menuItemEntity = $this->menuRepository->getMenuEntityById($idMenu);
		$allLangsMenuItems = $this->menuRepository->findItemsByOrder($menuItemEntity->getOrder());

		$pageContentEntity = $this->getPageContentEntity($idMenu, $idBlock);
		$originalItemOrder = $pageContentEntity->getOrder();
		if ($originalItemOrder) {
			$this->connection->begin();
			try {
				foreach ($allLangsMenuItems as $menuItem) {
					$newItemOrder = ($moveUp ? $originalItemOrder - 1 : $originalItemOrder + 1);
					$query = [	// first need to change order with lower order to higher
						"update page_content set `order` = %i
							where menu_item_id = %i and `order` = %i",
						$originalItemOrder,
						$menuItem->getId(),
						$newItemOrder		// it is order of lower items
					];
					$this->connection->query($query);

					$query = [	// then need to upgrade current (clicked) item
						"update page_content set `order` = %i
							where menu_item_id = %i and block_id = %i",
						$newItemOrder,
						$menuItem->getId(),
						$idBlock
					];
					$this->connection->query($query);
				}
			} catch (\Exception $e) {
				//dump($e->getMessage());
				$this->connection->rollback();
			}
			$this->connection->commit();
		}
	}

	/**
	 * returns all already included block in link
	 *
	 * @param int $idMenu
	 * @return BlockEntity[]
	 */
	public function findAddedBlock($idMenu, $lang) {
		$blocks = [];
		$query = ["select * from page_content where menu_item_id = %s order by `order`", $idMenu];

		$result = $this->connection->query($query)->fetchAll();
		foreach($result as $item) {
			$blocks[] = $this->getBlockById($lang, $item['block_id']);

		}

		return $blocks;
	}

	/**
	 * @param int $idMenu
	 * @param int $idBlock
	 * @return PageContentEntity
	 */
	private function getPageContentEntity($idMenu, $idBlock) {
		$query = [
			"select * from page_content where menu_item_id = %i and block_id = %i",
			$idMenu,
			$idBlock
		];

		$result = $this->connection->query($query)->fetch();
		$pageContentEntity = new PageContentEntity();
		$pageContentEntity->hydrate($result->toArray());

		return $pageContentEntity;
	}

	/**
	 * @param string $lang
	 * @param int $blockId
	 * @return BlockEntity
	 */
	private function getBlockById($lang, $blockId) {
		$query = ["
			select b.id as id, b.background_color, b.color, b.width, bc.lang, bc.content
			from block as b left join block_content as bc on b.id = bc.block_id
				where lang = %s and
				b.id = %i",
			$lang,
			$blockId
		];

		$result = $this->connection->query($query)->fetch();
		$blockContentEntity = new BlockContentEntity();
		$blockContentEntity->hydrate($result->toArray());

		$blockEntity = new BlockEntity();
		$blockEntity->hydrate($result->toArray());
		$blockEntity->setBlockContent($blockContentEntity);

		return $blockEntity;
	}

	/**
	 * @param BlockPicsEntity[] $pics
	 */
	private function savePics(array $pics) {
		/** @var BlockPicsEntity $blockPicEntity */
		foreach ($pics as $blockPicEntity) {
			$query = ["insert into block_pic", $blockPicEntity->extract()];
			$this->connection->query($query);
		}

	}

	/**
	 * @param BlockContentEntity[] $blockContentMutation
	 * @param int $blockId
	 */
	private function saveBlockContents(array $blockContentMutation, $blockId) {
		$query = ["select * from block_content where block_id = %i", $blockId];
		$result = $this->connection->query($query)->fetchAll();
		/** @var BlockContentEntity $blockContentEntity */
		foreach ($blockContentMutation as $blockContentEntity) {
			$blockContentEntity->setBlockId($blockId);
			if ($result) {
				$query = ["update block_content set " . self::KEY_CONTENT . " = %s
						  where ".self::KEY_CONTENT_LANG." = %s
						  	and block_id = %i",
						$blockContentEntity->getContent(),
						$blockContentEntity->getLang(),
						$blockId
				];
			} else {
				$query = ["insert into block_content", $blockContentEntity->extract()];
			}
			$this->connection->query($query);
		}
	}

	/**
	 * @param BlockEntity $blockEntity
	 * @return int
	 */
	private function saveBlockEntity(BlockEntity $blockEntity) {
		if (empty($blockEntity->getId())) {
			$query = ["insert into block", $blockEntity->extract()];
		} else {
			$query = ["
				update block set ". self::KEY_BACKGROUND_COLOR ." = %s,
				  ". self::KEY_COLOR . " = %s,
				  " . self::KEY_WIDTH . " = %s
				where id = %i",
				$blockEntity->getBackgroundColor(),
				$blockEntity->getColor(),
				$blockEntity->getWidth(),
				$blockEntity->getId()
			];
		}
		$this->connection->query($query);

		return (empty($blockEntity->getId()) ? $this->connection->getInsertId() : $blockEntity->getId());
	}
}