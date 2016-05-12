<?php

namespace App\AdminModule\Presenters;

use App\AdminModule\Model;
use App\Forms\UserForm;
use App\Model\UserRepository;

class UserPresenter extends SignPresenter {

	/** @var UserRepository */
	private $userRepository;

	/** @var UserForm */
	private $userForm;

	/**
	 * @param UserRepository $userRepository
	 * @param UserForm $userForm
	 */
	public function __construct(UserRepository $userRepository, UserForm $userForm) {
		$this->userRepository = $userRepository;
		$this->userForm = $userForm;
	}

	/**
	 * defaultní akce presenteru naète uivatele
	 */
	public function actionDefault() {
		$this->template->users = $this->userRepository->findUsers();
	}

	/**
	 * @param int $id
	 */
	public function actionDeleteUser($id) {
		if ($this->userRepository->deleteUser($id)) {
			$this->flashMessage(USER_DELETED, "alert-success");
		} else {
			$this->flashMessage(USER_DELETED_FAILED, "alert-danger");
		}
		$this->redirect('default');
	}

	public function createComponentEditForm() {
		$form = $this->userForm->create($this);
		$form->onSuccess[] = $this->saveUser;

		return $form;
	}

	public function saveUser($form, $values) {
		dump($form, $values); die;

		$this->redirect("Default");

	}

	/**
	 * @param int $id
	 */
	public function actionEdit($id) {
		$this->template->user = null;
	}

	/**
	 *
	 */
	public function handleActiveSwitch() {
		$data = $this->request->getParameters();
		$userId = $data['idUser'];
		$switchTo = (!empty($data['to']) && $data['to'] == "false" ? false : true);

		if ($switchTo) {
			$this->userRepository->setUserActive($userId);
		} else {
			$this->userRepository->setUserInactive($userId);
		}

		$this->terminate();
	}
}