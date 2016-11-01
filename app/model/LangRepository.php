<?php

namespace App\Model;

use Nette\Http\Session;

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
	 * Will switch to the language
	 *
	 * @param Session $sessionSection
	 * @param string $lang
	 */
	public function switchToLanguage(Session $sessionSection, $lang) {
		$langSession = $sessionSection->getSection('webLang');
		$langSession->langId = $lang;
	}
}