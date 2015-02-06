<?php
session_start();

include_once 'article.php';
include_once 'cart.php';

if(isset($_SESSION['cart'])) {
	$cart = unserialize($_SESSION['cart']);

	if(isset($_POST['id'])) {
		$id = $_POST['id'];
		if($cart->removeArticle($id)){
			$_SESSION['cart'] = serialize($cart);
			echo 'article '. $id .' has been removed';
		} else {
			echo 'this article id does not exist';
		}
	} else {
		echo 'id is not defined';
	}

} else {
	echo 'current cart is empty';
}

