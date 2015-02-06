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
		echo "<div><b>". $this->name."</b> : ".$this->quantity."</div>";
	}

	function displayRow($i) {
		echo "<td>$this->name</td>";
		echo "<td>$this->quantity</td>";
		echo "<td><div class='tiny button' onclick='removeArticle(".$i.");'>Supprimer</div></td>";
	}
}
