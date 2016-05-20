<?php

namespace App\Model;

use App\Model\Entity\FooterPicEntity;

class FooterPicRepository extends BaseRepository {

	/**
	 * @return FooterPicEntity[]
	 */
	public function load() {
		$return = [];
		$query = "select * from footer_pic";
		$result = $this->connection->query($query)->fetchAll();
		foreach ($result as $item) {
			$footerPic = new FooterPicEntity();
			$footerPic->hydrate($item->toArray());
			$return[] = $footerPic;
		}

		return $return;
	}

	/**
	 * @param FooterPicEntity $footerPicEntity
	 * @return \Dibi\Result|int
	 */
	public function save(FooterPicEntity $footerPicEntity) {
		$query = ["insert into footer_pic", $footerPicEntity->extract()];
		return $this->connection->query($query);
	}

	/**
	 * @param int $id
	 * @return \Dibi\Result|int
	 */
	public function delete($id) {
		$query = ["delete from footer_pic where id = %i", $id];
		return $this->connection->query($query);
	}


	public function getById($id) {
		$query = ["select * from footer_pic where id = %i", $id];
		$result = $this->connection->query($query)->fetch();
		$footerPic = new FooterPicEntity();
		if ($result) {
			$footerPic->hydrate($result->toArray());
		}

		return $footerPic;
	}

}