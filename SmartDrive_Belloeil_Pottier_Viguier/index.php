<?php
	session_start();
	include_once './config.php';
	
	// Si l'utilisateur n'a jamais choisi de drive
	// TODO
	header("Location: views/choixDrive.php");
	
	// Si l'utilisateur est connecté (cookies) ou a déjà choisi un drive
	$_SESSION['titre'] = "HCI Drive - Accueil";
	$_SESSION['section'] = "./home.php";
	header("Location: views/gabarit.php");