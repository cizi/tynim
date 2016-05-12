<?php

namespace App\Enum;

class Enum {

	/** @var string  */
	private $class;

	/**
	 * @param string $class
	 */
	public function __construct($class) {
		$this->class = $class;
	}

	public function arrayKeyValue() {
		$ref = new \ReflectionClass($this->class);
		return $ref->getConstants();
	}

	public function arrayValueKey() {
		return array_flip($this->arrayKeyValue());
	}

	public function translatedForSelect() {
		$data = $this->arrayValueKey();
		$result = [];
		foreach ($data as $value => $key) {
			$result[$value] = constant($key);
		}

		return $result;
	}
}