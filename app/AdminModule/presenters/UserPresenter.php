<?php

namespace App\AdminModule\Presenters;

use App\AdminModule\Model;
use App\AdminModule\Model\UserRepository;

class UserPresenter extends SignPresenter {

	/** @var UserRepository */
	private $userRepository;

	/**
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}

	/**
	 * defaultní akce presenteru naète uživatele
	 */
	public function actionDefault() {
		$this->template->users = $this->userRepository->findUsers();
	}

	/**
	 * @param int $id
	 */
	public function actionDeleteUser($id) {
		if ($this->userRepository->deleteUser($id)) {
			$this->flashMessage(USER_DELETED);
		} else {
			$this->flashMessage(USER_DELETED_FAILED);
		}
		$this->redirect('default');
	}

	/**
	 * @param int $id
	 */
	public function  actionEditUser($id) {

	}
}