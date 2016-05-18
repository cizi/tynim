<?php

namespace App\Model;

class WebconfigRepository extends BaseRepository{

	/** @const for showing menu input */
	const KEY_WEB_SHOW_HOME = "WEB_SHOW_HOME";

	/** @const for show menu */
	const KEY_WEB_SHOW_MENU = "WEB_SHOW_MENU";

	/** @const for bg color for menu */
	const KEY_WEB_MENU_BG = "WEB_MENU_BG";

	/** @const for web width */
	const KEY_WEB_WIDTH = "WEB_WIDTH";

	/** @const for favicon */
	const KEY_FAVICON = "WEB_FAVICON";

	/** @const for background color */
	const KEY_BODY_BACKGROUND_COLOR = "WEB_CONFIG_BACKGROUND_COLOR";

	// -- language depends --

	/** @const for title */
	const KEY_WEB_TITLE = "WEB_TITLE";

	/** @const for google analytics */
	const KEY_WEB_GOOGLE_ANALYTICS = "WEG_GOOGLE_ANALYTICS";

	/** @const for web keywords */
	const KEY_WEB_KEYWORDS = "WEB_KEYWORDS";

	/** @const for web language */
	const KEY_WEB_MUTATION = "WEB_MUTATION";

	/**
	 * @return array
	 */
	public function load($lang) {
		$query = ["select * from web_config where lang = %s", $lang];
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
	 * @param string $lang
	 * @return \Dibi\Result|int
	 */
	public function save($key, $value, $lang) {
		$query = ["select * from web_config where id = %s and lang = %s", $key, $lang];
		if ($this->connection->query($query)->fetch()) { // update
			$query = ["update web_config set value = %s where id = %s and lang = %s", $value, $key, $lang];
		} else {	// insert
			$query = ["insert into web_config values (%s, %s ,%s)", $key, $lang, $value];
		}

		return $this->connection->query($query);
	}

	/**
	 * @param string $key
	 * @return string
	 */
	public function getByKey($key, $lang = "cs") {
		$ret = "";
		$query = ["select * from web_config where id = %s and lang = %s", $key, $lang];
		$result = $this->connection->query($query)->fetch();
		if ($result) {
			$ret = $result->value;
		}

		return $ret;
	}
}