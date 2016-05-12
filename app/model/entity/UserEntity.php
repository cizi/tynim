<?php

namespace App\Model\Entity;

class UserEntity {

	/** @var int */
	private $id;

	/** @var string */
	private $login;

	/** @var string */
	private $password;

	/** @var int */
	private $role;

	/** @var bool */
	private $active;

	/** @var string  */
	private $lastLogin;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getLastLogin() {
		return $this->lastLogin;
	}

	/**
	 * @param string $lastLogin
	 */
	public function setLastLogin($lastLogin) {
		$this->lastLogin = $lastLogin;
	}

	/**
	 * @return string
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @param string $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return int
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * @param int $role
	 */
	public function setRole($role) {
		$this->role = $role;
	}

	/**
	 * @return boolean
	 */
	public function isActive() {
		return $this->active;
	}

	/**
	 * @param boolean $active
	 */
	public function setActive($active) {
		$this->active = $active;
	}

	/**
	 * @param array $data
	 */
	public function hydrate(array $data) {
		$this->id = $data['id'];
		$this->login = $data['login'];
		$this->password = $data['password'];
		$this->role = $data['role'];
		$this->active = $data['active'];
		$this->lastLogin = $data['last_login'];
	}

	/**
	 * @return array
	 */
	public function extract() {
		return [
			'id' => $this->id,
			'login' => $this->login,
			'password' => $this->password,
			'role' => $this->role,
			'active' => $this->active,
			'last_login' => $this->lastLogin
		];
	}
}