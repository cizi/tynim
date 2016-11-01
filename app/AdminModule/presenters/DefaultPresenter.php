<?php

namespace App\AdminModule\Presenters;

use App\Model\LangRepository;
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

	/** @var LangRepository $langRepository */
	private $langRepository;

	public function __construct(SignForm $signForm, UserRepository $userRepository, LangRepository $langRepository) {
		$this->singInForm = $signForm;
		$this->userRepository = $userRepository;
		$this->langRepository = $langRepository;
	}

	/**
	 * Pokud usem již přihlášen, přesměruji na Dashboard
	 */
	public function actionDefault() {
		$this->langRepository->switchToLanguage($this->session, "cs");

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

		try {
			$credentials = ['email' => $values['login'], 'password' => $values['password']];
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