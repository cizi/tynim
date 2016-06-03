<?php

namespace App\Model;

use App\Model\Entity\BlockContentEntity;
use App\Model\Entity\BlockEntity;
use App\Model\Entity\BlockPicsEntity;
use Dibi\Exception;

class BlockRepository extends BaseRepository {

	/**
	 * @param string $lang
	 * @return BlockEntity[]
	 */
	public function findBlockList($lang) {
		$query = ["
			select * from block as b left join block_content as bc on b.id = bc.block_id where lang = %s",
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
		$query = ["select * from block_pics"];
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

		} catch (Exception $e) {
			$this->connection->rollback();
			return false;
		}

		$this->connection->commit();
		return true;
	}
}