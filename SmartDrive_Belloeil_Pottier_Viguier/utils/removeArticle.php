<?php
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	} else {
		echo 'current cart is empty';
	}

	if($_POST['id']) {
		if($id = intval($_POST['id'])) {
			if($cart->removeArticle($id-1)){
				echo 'article has been removed';
			} else {
				echo 'this article id does not exist';
			}
		} else {
			echo 'wrong id';
		}
	} else {
		echo 'id is not defined';
	}
?>