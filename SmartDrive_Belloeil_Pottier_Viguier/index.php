<?php
session_start();
if(!isset($_SESSION['chosenDrive'])) {
	// Si l'utilisateur n'a jamais choisi de drive
	header("Location: views/choixDrive.php");
}
else {
	// Si l'utilisateur a déjà choisi un drive
	$_SESSION['titre'] = "HCI Drive - Accueil";
	$_SESSION['section'] = "./home.php";
	unset($_SESSION['nav']);
	unset($_SESSION['navLink']);
	unset($_SESSION['nav2']);
	header("Location: views/gabarit.php");
}