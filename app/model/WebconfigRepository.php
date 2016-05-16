<?php

namespace App\Model;

class WebconfigRepository extends BaseRepository{

	/** @const for favicon */
	const KEY_FAVICON = "WEB_FAVICON";

	/** @const for title */
	const KEY_WEB_TITLE = "WEB_TITLE";

	/** @const for web width */
	const KEY_WEB_WIDTH = "WEB_WIDTH";

	/** @const for google analytics */
	const KEY_WEG_GOOGLE_ANALYTICS = "WEG_GOOGLE_ANALYTICS";

	const KEY_BODY_BACKGROUND_COLOR = "WEB_CONFIG_BACKGROUND_COLOR";

	/**
	 * @return array
	 */
	public function load() {
		$query = "select * from web_config";
		$result = $this->connection->query($query)->fetchAll();

		$ret = [];
		foreach($result as $line) {
			$ret[$line->id] = $line->value;
		}

		return $ret;
	}

	/**
	 * @param string $key
	 * @param string $value
	 * @return \Dibi\Result|int
	 */
	public function save($key, $value) {
		$query = ["select * from web_config where id = %s", $key];
		if ($this->connection->query($query)->fetch()) { // update
			$query = ["update web_config set value = %s where id = %s", $value, $key];
		} else {	// insert
			$query = ["insert into web_config values (%s, %s)", $key, $value];
		}

		return $this->connection->query($query);
	}

	/**
	 * @param string $key
	 * @return string
	 */
	public function getByKey($key) {
		$ret = "";
		$query = ["select * from web_config where id = %s", $key];
		$result = $this->connection->query($query)->fetch();
		if ($result) {
			$ret = $result->value;
		}

		return $ret;
	}
}