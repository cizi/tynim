<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\FrontendModule\Presenters\BasePresenter;

class SignPresenter extends BasePresenter {

	/**
	 * Pokud není uivatel pøihlášen pøesmìruji ho a login page
	 */
	public function startup() {
		if($this->getUser()->isLoggedIn() == false){
			$this->redirect('Default:default');
		}
		parent::startup();
	}
}
