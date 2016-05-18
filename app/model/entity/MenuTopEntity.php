<?php

namespace App\Model\Entity;

class MenuTopEntity {

	/** @var int */
	private $id;

	/** @var string  */
	private $linkName;

	/** @var string  */
	private $menuName;

	/** @var string  */
	private $order;

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
	public function getLinkName() {
		return $this->linkName;
	}

	/**
	 * @param string $linkName
	 */
	public function setLinkName($linkName) {
		$this->linkName = $linkName;
	}

	/**
	 * @return string
	 */
	public function getMenuName() {
		return $this->menuName;
	}

	/**
	 * @param string $menuName
	 */
	public function setMenuName($menuName) {
		$this->menuName = $menuName;
	}

	/**
	 * @return string
	 */
	public function getOrder() {
		return $this->order;
	}

	/**
	 * @param string $order
	 */
	public function setOrder($order) {
		$this->order = $order;
	}

	public function hydrate(array $data) {
		$this->id = (isset($data['id']) ? $data['id'] : null);
		$this->linkName = $data['link_name'];
		$this->menuName = $data['menu_name'];
		$this->order = (isset($data['order']) ? $data['order'] : 0);
	}

	/**
	 * @return array
	 */
	public function extract() {
		return [
			'id' => $this->id,
			"link_name" => $this->linkName,
			'menu_name' => $this->menuName,
			"order"	=> $this->order
		];
	}

}