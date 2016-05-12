<?php

namespace App\Model;

use App\Model\Entity\UserEntity;

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
		$return = false;
		if (!empty($id)) {
			$query = ["delete from user where id = %i", $id ];
			$return = ($this->connection->query($query) == 1 ? true : false);
		}

		return $return;
	}

	public function addUser(UserEntity $userEntity) {

	}

	public function changePassword($id, $oldPass, $newPass) {

	}

	/**
	 * @param int $id
	 * @return \Dibi\Result|int
	 */
	public function setUserActive($id) {
		$query = ["update user set active = 1 where id = %i", $id];
		return $this->connection->query($query);
	}

	/**
	 * @param int $id
	 * @return \Dibi\Result|int
	 */
	public function setUserInactive($id) {
		$query = ["update user set active = 0 where id = %i", $id];
		return $this->connection->query($query);
	}

	/**
	 * @param int $id
	 * @return \Dibi\Result|int
	 */
	public function updateLostLogin($id) {
		$query = ["update user set last_login = NOW() where id = %i", $id];
		return $this->connection->query($query);
	}
}