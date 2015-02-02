<?php
	session_start();
	$_SESSION['titre'] = "HCI Drive - Connexion";
	$_SESSION['section'] = "./connexion.html";
	$_SESSION['nav'] = "Connexion";
	unset($_SESSION['navLink']);
	unset($_SESSION['nav2']);
	header("Location: ./gabarit.php");
?>
