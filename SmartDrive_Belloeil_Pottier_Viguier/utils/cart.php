<?php

class Cart {
	private $list;

	function __construct() {
		$this->list = new arrayObject();
	}

	function addArticle($article) {
		$this->list->append($article);
	}

	function removeArticle($id) {
		if($this->list->offsetExists($id)) {
			$this->list->offsetUnset($id);
			return true;
		} else {
			return false;
		}
	}

	function display() {
		foreach ($this->list as $key => $article) {
			$article->display();
		}
	}

	function displayRow() {
		foreach ($this->list as $key => $article) {
			echo "<tr>";
			$article->displayRow($key);
			echo "</tr>";
		}
	}
}