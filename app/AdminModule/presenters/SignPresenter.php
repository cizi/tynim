<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\FrontendModule\Presenters\BasePresenter;

class SignPresenter extends BasePresenter {

	/**
	 * Pokud nen� u�ivatel p�ihl�en p�esm�ruji ho a login page
	 */
	public function startup() {
		if($this->getUser()->isLoggedIn() == false){
			$this->redirect('Default:default');
		}
		parent::startup();
	}
}
