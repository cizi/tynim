<?php

namespace App\Model;

class LangRepository {

	public function findLanguages() {
		$result = [];
		$languages = scandir(LANG_PATH);
		foreach ($languages as $index => $value ) {
			if ($value != "." && $value != "..")  {
				$result[$value] = $value;
			}
		}

		return $result;
	}
}