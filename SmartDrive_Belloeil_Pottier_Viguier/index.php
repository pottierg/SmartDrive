<?php
	session_start();
	include_once './config.php';
	
	// Si l'utilisateur n'a jamais choisi de drive
	// TODO
	header("Location: views/choixDrive.php");
	
	// Si l'utilisateur est connect� (cookies) ou a d�j� choisi un drive
	$_SESSION['titre'] = "HCI Drive - Accueil";
	$_SESSION['section'] = "./home.php";
	header("Location: views/gabarit.php");