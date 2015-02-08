<?php
session_start();

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

if(isset($_SESSION['isConnected'])) {
	$sql = "UPDATE Adresse SET ";
	$sql .= "numeroAdresse='".$_POST['norue']."', ";
	$sql .= "rueAdresse='".$_POST['nrue']."', ";
	$sql .= "villeAdresse='".$_POST['ville']."', ";
	$sql .= "codePostalAdresse='".$_POST['cp']."', ";
	$sql .= "telephoneAdresse='".$_POST['phone']."' ";
	$sql .= "WHERE idAdresse=".$_SESSION['idAdresse'];
	
	if(!mysqli_query($link, $sql)) {
		// Failure case
		$_SESSION['titre'] = "HCI Drive - Gestion de compte";
		$_SESSION['section'] = "./echecModification.html";
		$_SESSION['nav'] = "Gestion de compte";
		unset($_SESSION['navLink']);
		unset($_SESSION['nav2']);
		header("Location: ../views/gabarit.php");
	}
	
	$sql = "UPDATE Client SET ";
	$sql .= "emailClient='".$_POST['mail']."', ";
	$sql .= "mdpClient='".md5($_POST['pwd'])."', ";
	$sql .= "nomClient='".$_POST['nom']."', ";
	$sql .= "prenomClient='".$_POST['prenom']."' ";
	$sql .= "WHERE idClient=".$_SESSION['idClient'];
	
	if(!mysqli_query($link, $sql)) {
		// Failure case
		$_SESSION['titre'] = "HCI Drive - Gestion de compte";
		$_SESSION['section'] = "./echecModification.html";
		$_SESSION['nav'] = "Gestion de compte";
		unset($_SESSION['navLink']);
		unset($_SESSION['nav2']);
		header("Location: ../views/gabarit.php");
	}
	
	// Success case
	$_SESSION['isConnected'] = true;
	$_SESSION['username'] = $_POST['prenom']." ".$_POST['nom'];
	$_SESSION['userMail'] = $_POST['mail'];
	
	$_SESSION['titre'] = "HCI Drive - Gestion de compte";
	$_SESSION['section'] = "./modifier.php";
	$_SESSION['nav'] = "Gestion de compte";
	$_SESSION['navLink'] = "./gotoGestionCompte.php";
	$_SESSION['nav2'] = "Modifier les informations personnelles";
	header("Location: ../views/gabarit.php");
}

