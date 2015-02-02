<?php
	session_start();
	$_SESSION['titre'] = "HCI Drive - Inscription";
	$_SESSION['section'] = "./inscription.html";
	$_SESSION['nav'] = "Inscription";
	unset($_SESSION['navLink']);
	unset($_SESSION['nav2']);
	header("Location: ./gabarit.php");
?>
