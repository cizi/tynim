<?php

namespace App\Model;

class WebconfigRepository extends BaseRepository{

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

}