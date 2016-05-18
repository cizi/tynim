<?php

namespace App\AdminModule\Presenters;

use App\Forms\WebconfigForm;
use App\Model\LangRepository;
use App\Model\WebconfigRepository;
use Nette\Http\FileUpload;

class WebconfigPresenter extends SignPresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var LangRepository */
	private $langRepository;

	/** @var WebconfigForm */
	private $configForm;

	public function __construct(WebconfigRepository $webconfigRepository, WebconfigForm $webconfigForm, LangRepository $langRepository) {
		$this->webconfigRepository = $webconfigRepository;
		$this->configForm = $webconfigForm;
		$this->langRepository = $langRepository;
	}

	public function actionDefault() {
		$langSession = $this->session->getSection('webLang');
		$lang = ((isset($langSession->langId) && $langSession->langId != null) ? $langSession->langId : 'cs');

		$defaults = $this->webconfigRepository->load($lang);
		$defaults[WebconfigRepository::KEY_WEB_MUTATION] = $lang;
		$this['configForm']->setDefaults($defaults);
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function createComponentConfigForm() {
		$form = $this->configForm->create($this->presenter);
		$form->onSuccess[] = $this->saveValue;

		return $form;
	}

	public function actionLangChange($id) {
		$langSession = $this->session->getSection('webLang');
		$langSession->langId = $id;
		$this->redirect("default");
	}

	/**
	 * @param $form
	 * @param $values
	 */
	public function saveValue($form, $values) {
		$lang = $values[WebconfigRepository::KEY_WEB_MUTATION];
		foreach ($values as $key => $value) {
			if ($key == WebconfigRepository::KEY_FAVICON) {
				/** @var FileUpload $file */
				$file = $value;
				if (empty($file->name)) continue;
				if (substr($file->name, -3) != "ico" || substr($file->name, -3) != "ico") {
					$this->flashMessage(WEBCONFIG_WEB_FAVICON_FORMAT, "alert-danger");
					continue;
				}
				$pathDb = '/upload/' . date("Ymd-His") . "-" . $file->name;
				$path = UPLOAD_PATH . '/' . date("Ymd-His") . "-" . $file->name;
				$file->move($path);
				$value = $pathDb;
			}
			$this->webconfigRepository->save($key, $value, $lang);
		}
		$this->flashMessage(WEBCONFIG_WEB_SAVE_SUCCESS, "alert-success");
		$this->redirect("default");
	}

}