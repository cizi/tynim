<?php

namespace App\AdminModule\model;

use Nette;
use Nette\Security\Passwords;

/**
 * Users management.
 */
class UserManager extends Nette\Object implements Nette\Security\IAuthenticator {

	const
		TABLE_NAME = 'user',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'login',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_ROLE = 'role';

	/** @var Nette\Database\Context */
	private $connection;

	public function __construct(\Dibi\Connection $connection) {
		$this->connection = $connection;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials) {
		list($username, $password) = $credentials;

		$query = ["select * from ". self::TABLE_NAME . " where " . self::COLUMN_NAME . " = %s", $username];
		$row = $this->connection->query($query)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);

		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Adds new user.
	 * @param $username string
	 * @param $password string
	 * @param int $role
	 * @return void
	 * @throws DuplicateNameException
	 */
	public function add($username, $password, $role = 10) {
		try {
			$query = ["insert into " . self::TABLE_NAME . " values (null, '". $username . "', '" . Passwords::hash($password) . "', " . $role . ")"];
			$this->connection->query($query);
		} catch (Nette\Database\UniqueConstraintViolationException $e) {
			throw new DuplicateNameException;
		}
	}

}


class DuplicateNameException extends \Exception {
}
