<?php

namespace App\AdminModule\Presenters;

use App\Model\UserRepository;
use App\Forms\SignForm;
use App\FrontendModule\Presenters\BasePresenter;
use Nette\Application\UI\Form;
use App\AdminModule\Presenters;

class DefaultPresenter extends BasePresenter {

	/** @var SignForm */
	public $singInForm;

	/** @var UserRepository */
	public $userRepository;

	public function __construct(SignForm $signForm, UserRepository $userRepository) {
		$this->singInForm = $signForm;
		$this->userRepository = $userRepository;
	}

	/**
	 * Pokud usem již přihlášen, přesměruji na Dashboard
	 */
	public function actionDefault() {
		if ($this->user->isLoggedIn()) {
			$this->redirect('Dashboard:Default');
		}
	}

	/**
	 * Sign-in form factory.
	 * @return Form
	 */
	public function createComponentSignInForm(){
		$form = $this->singInForm->create();
		$form->onSuccess[] = $this->formSucceeded;

		return $form;
	}

	/**
	 * @param Form $form
	 * @param $values
	 */
	public function formSucceeded(Form $form, $values) {
		if ($values->remember) {
			$this->user->setExpiration('14 days', false);
		} else {
			$this->user->setExpiration('20 minutes', true);
		}

		//$this->user->getAuthenticator()->add("test", "test", 99);

		try {
			$credentials = [$values['login'], $values['password']];
			$identity = $this->user->getAuthenticator()->authenticate($credentials);
			$this->user->login($identity);
			$this->userRepository->updateLostLogin($identity->getId());
			$this->redirect("Dashboard:Default");
		} catch (\Nette\Security\AuthenticationException $e) {
			$form->addError(ADMIN_LOGIN_FAILED);
		}
	}

	public function actionOut(){
		$this->getUser()->logout();
		$this->flashMessage(ADMIN_LOGIN_UNLOGGED);
		$this->redirect('default');
	}
}