<?php

class Article {
	private $id;
	private $name;
	private $quantity;

	function __construct($id, $name, $quantity) {
		$this->id = $id;
		$this->name = $name;
		$this->quantity = $quantity;
	}

	function getId() {
		return $this->id;
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

	function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	function display()
	{
		echo "<div><b>" . $this->name . "</b> : " . $this->quantity . "</div>";
	}

	function displayRow($i) {
		echo "<td>$this->name</td>";
		echo "<td>$this->quantity</td>";
		echo "<td><div class='tiny button' onclick='removeArticle(".$i.");'>Supprimer</div></td>";
	}
}
