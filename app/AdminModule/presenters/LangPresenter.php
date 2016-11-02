<?php

namespace App\AdminModule\Presenters;


use App\Forms\LangForm;
use App\Forms\LangItemForm;

class LangPresenter extends SignPresenter {

	/** @var LangForm $langForm */
	private $langForm;

	/** @var LangItemForm */
	private $langItemForm;

	public function __construct(LangForm $langForm, LangItemForm $langItemForm) {
		$this->langForm = $langForm;
		$this->langItemForm = $langItemForm;
	}

	public function renderDefault() {

	}

	public function createComponentLangForm() {
		$form = $this->langForm->create();
		$form->onSuccess[] = $this->saveLangCommon;

		return $form;
	}

	public function saveLangCommon() {

	}

	public function createComponentLangItemForm() {
		$form = $this->langItemForm->create();
		$form->onSuccess[] = $this->saveLangItem;

		return $form;
	}

	public function saveLangItem() {

	}
}