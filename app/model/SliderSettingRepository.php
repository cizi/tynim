<?php

namespace App\Model;

use App\Model\Entity\SliderPicEntity;

class SliderSettingRepository extends BaseRepository {

	/** @const for slider enabled/disabled */
	const KEY_SLIDER_ON = "SLIDER_ON";

	/** @const for slider width */
	const KEY_SLIDER_WIDTH = "SLIDER_WIDTH";

	/** @const for slider timing */
	const KEY_SLIDER_TIMING = "SLIDER_TIMING";

	/**
	 * @return SliderPicEntity
	 */
	public function findPics() {
		$query = "select * from slider_pic";
		$result = $this->connection->query($query);

		$return = [];
		foreach($result->fetchAll() as $pic) {
			$picEntity = new SliderPicEntity();
			$picEntity->hydrate($pic->toArray());
			$return[] = $picEntity;
		}

		return $return;
	}

	/**
	 * @param SliderPicEntity $sliderPicEntity
	 * @return \Dibi\Result|int
	 */
	public function save(SliderPicEntity $sliderPicEntity) {
		$query = ["insert into slider_pic", $sliderPicEntity->extract()];
		return $this->connection->query($query);
	}

	/**
	 * @param int $idPic
	 * @return \Dibi\Result|int
	 */
	public function delete($idPic) {
		$query = ["delete from slider_pic where id = %i", $idPic];
		return $this->connection->query($query);
	}
}