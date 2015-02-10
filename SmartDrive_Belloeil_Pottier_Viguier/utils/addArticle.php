<?php

session_start();

include_once 'article.php';
include_once 'cart.php';

if(isset($_POST['name']) and isset($_POST['quantity']) and isset($_POST['id']) and isset($_POST['price'])) {

	if(isset($_SESSION['cart'])) {
		$cart = unserialize($_SESSION['cart']);
	} else {
		$cart = new Cart();
	}

	$article = new Article($_POST['id'], $_POST['name'], $_POST['quantity'], $_POST['price']);
	echo($cart->addArticle($article));
	$_SESSION['cart'] = serialize($cart);

	echo "Article is add to current cart";

} else {
	echo "Variables are empty";
}