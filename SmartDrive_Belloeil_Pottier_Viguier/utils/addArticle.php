<?php

session_start();

include_once 'article.php';
include_once 'cart.php';

if(isset($_POST['name']) && isset($_POST['quantity'])) {

	if(isset($_SESSION['cart'])) {
		$cart = unserialize($_SESSION['cart']);
	} else {
		$cart = new Cart();
	}

	$article = new Article($_POST['name'], $_POST['quantity']);
	$cart->addArticle($article);
	$_SESSION['cart'] = serialize($cart);

	echo "Article is add to current cart";

} else {
	echo "Variables are empty";
}