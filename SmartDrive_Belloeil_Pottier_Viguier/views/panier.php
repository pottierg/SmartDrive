<?php 
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
		$cart->display();
	} else {
		echo "<center style='margin-top: 2em;'><b>Le panier est vide</b><center>";
	}
?>