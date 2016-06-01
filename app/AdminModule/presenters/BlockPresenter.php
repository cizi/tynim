<?php

namespace App\AdminModule\Presenters;

use App\Forms\BlockForm;

class BlockPresenter extends SignPresenter {

	/** @var BlockForm  */
	private $blockForm;

	public function __construct(BlockForm $blockForm) {
		$this->blockForm = $blockForm;
	}

	public function actionDefault() {
		$this->template->blockPics = [];
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function createComponentBlockForm() {
		$form = $this->blockForm->create();

		return $form;
	}
	
}