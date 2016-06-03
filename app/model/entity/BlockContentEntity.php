<?php

namespace App\Model\Entity;

class BlockContentEntity {

	/** @var int */
	private $id;

	/** @var int */
	private $blockId;

	/** @var string */
	private $lang;

	/** @var string */
	private $content;

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
	public function getBlockId() {
		return $this->blockId;
	}

	/**
	 * @param int $blockId
	 */
	public function setBlockId($blockId) {
		$this->blockId = $blockId;
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
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * @param array $data
	 */
	public function hydrate(array $data) {
		$this->setId(isset($data['id']) ? $data['id'] : null);
		$this->setBlockId(isset($data['block_id']) ? $data['block_id'] : null);
		$this->setLang(isset($data['lang']) ? $data['lang'] : null);
		$this->setContent(isset($data['content']) ? $data['content'] : null);
	}

	/**
	 * @return array
	 */
	public function extract() {
		return [
			'id' => $this->getId(),
			'block_id' => $this->getBlockId(),
			'lang' => $this->getLang(),
			'content' => $this->getContent()
		];
	}
}