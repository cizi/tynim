<?php

namespace App\Model\Entity;

class MenuEntity {

	/** @var int */
	private $id;

	/**@var int */
	private $order;

	/** @var string */
	private $lang;

	/** @var string */
	private $link;

	/** @var string */
	private $title;

	/** @var string */
	private $alt;

	/** @var int */
	private $level;

	/** @var int suborder in the same level */
	private $suborder;

	/** @var bool */
	private $hasSubItems;

	/**
	 * @return boolean
	 */
	public function hasSubItems() {
		return $this->hasSubItems;
	}

	/**
	 * @param boolean $hasSubItems
	 */
	public function setHasSubItems($hasSubItems) {
		$this->hasSubItems = $hasSubItems;
	}

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
	 * @return int
	 */
	public function getOrder() {
		return $this->order;
	}

	/**
	 * @param int $order
	 */
	public function setOrder($order) {
		$this->order = $order;
	}

	/**
	 * @return string
	 */
	public function getLang() {
		return $this->lang;
	}

	/**
	 * @param string $lang
	 */
	public function setLang($lang) {
		$this->lang = $lang;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getAlt() {
		return $this->alt;
	}

	/**
	 * @param string $alt
	 */
	public function setAlt($alt) {
		$this->alt = $alt;
	}

	/**
	 * @return int
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * @param int $level
	 */
	public function setLevel($level) {
		$this->level = $level;
	}

	/**
	 * @return int
	 */
	public function getSuborder() {
		return $this->suborder;
	}

	/**
	 * @param int $suborder
	 */
	public function setSuborder($suborder) {
		$this->suborder = $suborder;
	}

	/**
	 * @param array $data
	 */
	public function hydrate(array $data) {
		$this->id = (isset($data['id']) ? $data['id'] : null);
		$this->order = (isset($data['order']) ? $data['order'] : null);
		$this->lang = (isset($data['lang']) ? $data['lang'] : null);
		$this->link = (isset($data['link']) ? $data['link'] : null);
		$this->title = (isset($data['title']) ? $data['title'] : null);
		$this->alt = (isset($data['alt']) ? $data['alt'] : null);
		$this->level = (isset($data['level']) ? $data['level'] : null);
		$this->suborder = (isset($data['suborder']) ? $data['suborder'] : null);
		$this->hasSubItems = (isset($data['hasSubItems']) ? $data['hasSubItems'] : null);
	}

	/**
	 * @return array
	 */
	public function extract() {
		return [
			'id' => $this->id,
			'order' => $this->order,
			'lang' => $this->lang,
			'link' => $this->link,
			'title' => $this->title,
			'alt' => $this->alt,
			'level' => $this->level,
			'suborder' => $this->suborder,
			'hasSubItems' => $this->hasSubItems
		];
	}
}