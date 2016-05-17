<?php

namespace App\AdminModule\Presenters;

use App\Forms\WebconfigForm;
use App\Model\WebconfigRepository;
use Nette\Http\FileUpload;

class WebconfigPresenter extends SignPresenter {

	/** @var WebconfigRepository */
	private $webconfigRepository;

	/** @var WebconfigForm */
	private $configForm;

	public function __construct(WebconfigRepository $webconfigRepository, WebconfigForm $webconfigForm) {
		$this->webconfigRepository = $webconfigRepository;
		$this->configForm = $webconfigForm;
	}

	public function actionDefault() {
		$defaults = $this->webconfigRepository->load();
		$this['configForm']->setDefaults($defaults);
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function createComponentConfigForm() {
		$form = $this->configForm->create();
		$form->onSuccess[] = $this->saveValue;

		return $form;
	}

	/**
	 * @param $form
	 * @param $values
	 */
	public function saveValue($form, $values) {
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
			$this->webconfigRepository->save($key, $value);
		}
		$this->flashMessage(WEBCONFIG_WEB_SAVE_SUCCESS, "alert-success");
		$this->redirect("default");
	}

}