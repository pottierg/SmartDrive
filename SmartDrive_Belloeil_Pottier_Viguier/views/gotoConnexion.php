<?php
	session_start();
	$_SESSION['titre'] = "HCI Drive - Connexion";
	$_SESSION['section'] = "./connexion.html";
	header("Location: ./gabarit.php");
?>
