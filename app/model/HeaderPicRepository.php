<?php

namespace App\Model;

use App\Model\Entity\PicEntity;

class HeaderPicRepository extends BaseRepository {

	/**
	 * Returns all available pics for header
	 *
	 * @return PicEntity[]
	 */
	public function load() {
		$return = [];
		$query = "select * from header_pic";
		$result = $this->connection->query($query)->fetchAll();
		foreach ($result as $item) {
			$pic = new PicEntity();
			$pic->hydrate($item->toArray());
			$return[] = $pic;
		}

		return $return;
	}

	/**
	 * @param PicEntity $footerPicEntity
	 * @return \Dibi\Result|int
	 */
	public function save(PicEntity $footerPicEntity) {
		$query = ["insert into header_pic", $footerPicEntity->extract()];
		return $this->connection->query($query);
	}

	/**
	 * @param int $id
	 * @return \Dibi\Result|int
	 */
	public function delete($id) {
		$query = ["delete from header_pic where id = %i", $id];
		return $this->connection->query($query);
	}

	/**
	 * @param int $id to delete
	 * @return PicEntity
	 */
	public function getById($id) {
		$query = ["select * from header_pic where id = %i", $id];
		$result = $this->connection->query($query)->fetch();
		$pic = new PicEntity();
		if ($result) {
			$pic->hydrate($result->toArray());
		}

		return $pic;
	}

}