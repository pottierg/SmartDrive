<?php
	session_start();
	$_SESSION['titre'] = "HCI Drive - Inscription";
	$_SESSION['section'] = "./inscription.html";
	header("Location: ./gabarit.php");
?>
