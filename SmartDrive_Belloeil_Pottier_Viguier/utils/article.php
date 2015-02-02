<?php

class Article {
	private $name;
	private $quantity;

	function __construct($name, $quantity) {
		$this->name = $name;
		$this->quantity = $quantity;
	}

	function getName() {
		return $this->name;
	}

	function setName($name) {
		$this->name = $name;
	}

	function getQuantity() {
		return $this->quantity;
	}

	function setQuatity($quantity) {
		$this->quantity = $quantity;
	}

	function display() {
		echo "<div>".$this->name." : ".$this->quantity."</div>";
	}
}

?>