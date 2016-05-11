<?php

namespace App\AdminModule\Presenters;

use App\Forms\SignForm;
use App\FrontendModule\Presenters\BasePresenter;
use Nette\Application\UI\Form;
use App\AdminModule\Presenters;

class DefaultPresenter extends BasePresenter {

	/** @var SignForm @inject */
	public $singInForm;

	/**
	 * Pokud usem ji pøihlášen, pøesmìruji na Dashboard
	 */
	public function actionDefault() {
		if ($this->user->isLoggedIn()) {
			$this->redirect('Dashboard:default');
		}
	}

	/**
	 * Sign-in form factory.
	 * @return Form
	 */
	public function createComponentSignInForm(){
		$form = $this->singInForm->create();

		return $form;
	}

	public function actionOut(){
		$this->getUser()->logout();
		$this->flashMessage(ADMIN_LOGIN_UNLOGGED);
		$this->redirect('default');
	}
}