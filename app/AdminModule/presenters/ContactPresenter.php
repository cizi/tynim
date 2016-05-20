<?php

namespace App\AdminModule\Presenters;

use App\Forms\ContactSettingForm;
use App\Model\WebconfigRepository;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

class ContactPresenter extends SignPresenter {

	/** @var WebconfigRepository */
	private $webconfigRespository;

	/** @var ContactSettingForm */
	private $contactSettingForm;

	/**
	 * @param WebconfigRepository $webconfigRepository
	 * @param ContactSettingForm $contactSettingForm
	 */
	public function __construct(WebconfigRepository $webconfigRepository, ContactSettingForm $contactSettingForm) {
		$this->webconfigRespository = $webconfigRepository;
		$this->contactSettingForm = $contactSettingForm;
	}

	public function actionDefault() {
		$defaults = $this->webconfigRespository->load(WebconfigRepository::KEY_LANG_FOR_COMMON);
		$this['contactSettingForm']->setDefaults($defaults);
	}

	/**
	 * @return Form
	 */
	public function createComponentContactSettingForm() {
		$form = $this->contactSettingForm->create();
		$form->onSuccess[] = $this->saveForm;

		return $form;
	}

	/**
	 * @param Form $form
	 * @param ArrayHash $values
	 */
	public function saveForm(Form $form, $values) {
		$lang = WebconfigRepository::KEY_LANG_FOR_COMMON;
		foreach ($values as $key => $value) {
			$this->webconfigRespository->save($key, $value, $lang);
		}
		$this->flashMessage(CONTACT_FORM_SETTING_COMPLETE_SAVE, "alert-success");
		$this->redirect('default');
	}
}