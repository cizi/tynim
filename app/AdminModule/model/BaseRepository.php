<?php
/**
 * Created by PhpStorm.
 * User: jan.cimler
 * Date: 10.05.2016
 * Time: 17:26
 */

namespace App\AdminModule\model;

class BaseRepository extends \Nette\Object {

	/** @var \Dibi\Connection */
	private $db;

	public function __construct(\Dibi\Connection $connection) {
		$this->db = $connection;
	}
}