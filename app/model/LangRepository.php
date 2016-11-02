<?php

namespace App\Model;

use Nette\Http\Session;

class LangRepository {

	/** @const string width key */
	const KEY_LANG_WIDTH = "LANG_WIDTH";

	/** @const string background color key */
	const KEY_LANG_BG_COLOR = "LANG_BG_COLOR";

	/** @const string font color key */
	const KEY_LANG_FONT_COLOR = "LANG_FONT_COLOR";

	/** @const string lang flag key */
	const KEY_LANG_ITEM_FLAG = "LANG_ITEM_FLAG";

	/** @const string lang description key */
	const KEY_LANG_ITEM_DESC = "LANG_ITEM_DESC";

	/** @const string lang shortcut */
	const KEY_LANG_ITEM_SHORT = "LANG_ITEM_SHORT";

	/**
	 * Returns all languages mutations by lang config files
	 * @return array
	 */
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

	/**
	 * @param Session $sessionSection
	 * @return string
	 */
	public function getCurrentLang(Session $sessionSection) {
		//$langSession = $this->session->getSection('webLang');
		$langSession = $sessionSection->getSection('webLang');
		$lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');

		return $lang;
	}

	/**
	 * Will switch to the another language
	 *
	 * @param Session $sessionSection
	 * @param string $lang
	 */
	public function switchToLanguage(Session $sessionSection, $lang) {
		$langSession = $sessionSection->getSection('webLang');
		$langSession->langId = $lang;
	}
}