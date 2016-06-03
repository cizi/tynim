<?php

namespace App\Model;

use App\Model\Entity\BlockContentEntity;
use App\Model\Entity\BlockEntity;
use App\Model\Entity\BlockPicsEntity;

class BlockRepository extends BaseRepository {

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
		/** @var BlockContentEntity $blockContentEntity */
		foreach ($blockContentMutation as $blockContentEntity) {
			$blockContentEntity->setBlockId($blockId);
			$query = ["insert into block_content", $blockContentEntity->extract()];
			$this->connection->query($query);
		}
	}

	/**
	 * @param BlockEntity $blockEntity
	 * @return int
	 */
	private function saveBlockEntity(BlockEntity $blockEntity) {
		$query = ["insert into block", $blockEntity->extract()];
		$result = $this->connection->query($query);

		return $this->connection->getInsertId();

	}
}