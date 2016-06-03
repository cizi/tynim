<?php

namespace App\Model\Entity;

class BlockPicsEntity {

	/** @var int */
	private $id;

	/** @var string */
	private $path;

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
	public function getPath() {
		return $this->path;
	}

	/**
	 * @param string $path
	 */
	public function setPath($path) {
		$this->path = $path;
	}

	/**
	 * @return array
	 */
	public function extract() {
		return [
			"id" => $this->getId(),
			"path" => $this->getPath()
		];
	}

	/**
	 * @param array $data
	 */
	public function hydrate(array $data) {
		$this->setId(isset($data['id']) ? $data['id'] : null);
		$this->setPath(isset($data['path']) ? $data['path'] : null);
	}
}