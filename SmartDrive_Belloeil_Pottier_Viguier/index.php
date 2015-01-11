<?php
	session_start();
	include_once './config.php';
	$_SESSION['titre'] = "Accueil";
	$_SESSION['section'] = "./home.php";
	
	header("Location: views/gabarit.php");