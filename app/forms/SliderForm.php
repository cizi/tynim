<?php

namespace App\Forms;

use App\Model\SliderPicRepository;
use Nette;
use Nette\Application\UI\Form;

class SliderForm extends Nette\Object {

	/** @var FormFactory */
	private $factory;

	/**
	 * @param FormFactory $factory
	 */
	public function __construct(FormFactory $factory) {
		$this->factory = $factory;
	}

	/**
	 * @return Form
	 */
	public function create() {
		$form = $this->factory->create();
		$form->addMultiUpload(SliderPicRepository::KEY_SLIDER_FILES_UPLOAD, SLIDER_SETTINGS_PICS)
			->setAttribute("class", "form-control")
			->setAttribute("tabindex", "1");

		$form->addSubmit("confirm", SLIDER_SETTINGS_SAVE_BTN_LABEL)
			->setAttribute("class","btn btn-primary")
			->setAttribute("tabindex", "2");

		return $form;
	}
}