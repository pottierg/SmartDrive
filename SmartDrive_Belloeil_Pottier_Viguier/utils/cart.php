<?php

class Cart {
	private $list;

	function __construct() {
		$this->list = new arrayObject();
	}

	function addArticle($article) {
		$id = $article->getId();
		if($this->list->offsetExists($id)) {
			$quantity = $this->list->offsetGet($id)->getQuantity();
			$this->list->offsetGet($id)->setQuantity($quantity + 1);
			return 'ok';
		} else {
			$this->list->offsetSet($id, $article);
			return 'ko';
		}
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