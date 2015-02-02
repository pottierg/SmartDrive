<?php
session_start();
unset($_SESSION['nav']);
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

if(isset($_POST['chosenAdresseId'])) {
	// Retrieve the drive's informations
	
	include_once '../databaseUtils/constantes.php';
	include_once '../databaseUtils/Database.class.php';
	
	$db = new Database();
	$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);
	$sql = "SELECT * FROM Drive, Adresse WHERE idAdresse=".$_POST['chosenAdresseId'];
	$sql .= " AND Drive.Adresse_idAdresse=Adresse.idAdresse";
	$req = mysqli_query($link, $sql);
	
	if($req == false) {
		// Failure case
		// void
	}
	else {
		$_SESSION['chosenDrive'] = mysqli_fetch_array($req);
		print_r($_SESSION['chosenDrive']);
	}
}

$_SESSION['section'] = "./home.php";
$_SESSION['titre'] = "HCI Drive - Accueil";

header("Location: ../views/gabarit.php");	