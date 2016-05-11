<?php

namespace App\AdminModule\Model;

use App\AdminModule\Model\Entity\UserEntity;

class UserRepository extends BaseRepository {

	/**
	 * @return UserEntity[]
	 */
	public function findUsers() {
		$query = "select * from user";
		$result = $this->connection->query($query);

		$users = [];
		foreach ($result->fetchAll() as $row) {
			$user = new UserEntity();
			$user->hydrate($row->toArray());
			$users[] = $user;
		}

		return $users;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function deleteUser($id) {
		return true;
	}

	public function addUser(UserEntity $userEntity) {

	}

	public function changePassword($id, $oldPass, $newPass) {

	}

	public function setUserActive($id) {

	}

	public function setUserInactive() {

	}

	public function updateLostLogin($id) {

	}
}