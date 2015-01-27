<?php
session_start();

/*
echo $_POST['nom'];
echo $_POST['prenom'];
echo $_POST['mail'];
echo $_POST['pwd'];
echo $_POST['phone'];
echo $_POST['norue'];
echo $_POST['nrue'];
echo $_POST['ville'];
echo $_POST['cp'];
*/

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

mysqli_query($link, "SET AUTOCOMMIT=0");
mysqli_query($link, "START TRANSACTION");

$sql = "INSERT INTO `Adresse` (`numeroAdresse`,`rueAdresse`,`villeAdresse`,`codePostalAdresse`,`telephoneAdresse`)"; 
$sql .= "VALUES (".$_POST['norue'].",'".$_POST['nrue']."','".$_POST['ville']."', ".$_POST['cp'].", ".$_POST['phone'].")";

if(!mysqli_query($link, $sql)) {
	// Failure case
	mysqli_query($link, "ROLLBACK");
	$_SESSION['section'] = "./echecInscription.php";
	$_SESSION['titre'] = "HCI Drive - Echec";
}

$sql = "INSERT INTO `Client` (`emailClient`,`mdpClient`,`nomClient`,`prenomClient`,`idAdresse`)";
$sql .= "VALUES (`".$_POST['mail']."`,`".md5($_POST['pwd'])."`,`".$_POST['nom']."`,`".$_POST['prenom']."`,";
$sql .= "(SELECT idAdresse FROM Adresse WHERE telephoneAdresse=".$_POST['phone']." AND rueAdresse='".$_POST['nrue']."'))";

if(!mysqli_query($link, $sql)) {
	// Failure case
	mysqli_query($link, "ROLLBACK");
	$_SESSION['section'] = "./echecInscription.php";
	$_SESSION['titre'] = "HCI Drive - Echec";
}
else {
	// Success case
	mysqli_query("COMMIT");
	$_SESSION['section'] = "./home.php";
	$_SESSION['titre'] = "HCI Drive - Accueil";
}

header("Location: ../views/gabarit.php");