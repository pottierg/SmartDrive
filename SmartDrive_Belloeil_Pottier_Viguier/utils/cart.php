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
		for ($i=0; $i < $this->list->count(); $i++) { 
			$this->list->offsetGet($i)->display();
		}
	}
}

?>