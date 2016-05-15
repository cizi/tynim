<?php

namespace App\AdminModule\Presenters;

use App\Forms\WebconfigForm;
use App\Model\WebconfigRepository;

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
			$this->webconfigRepository->save($key, $value);
		}
		$this->redirect("default");
	}

}