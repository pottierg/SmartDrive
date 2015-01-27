<?php
session_start();

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

$sql = "SELECT * FROM Client WHERE emailClient='".$_POST['email']."' AND mdpClient='".md5($_POST['pwd'])."'";

$req = mysqli_query($link, $sql);

if ($req == false) {
	// Database failure case
	$_SESSION['section'] = "./echecConnexion.php";
	$_SESSION['titre'] = "HCI Drive - Echec";
}
elseif (mysqli_num_rows($req) == 1) {
	// Identification OK
	$data = mysqli_fetch_assoc($req);
	$_SESSION['section'] = "./home.php";
	$_SESSION['titre'] = "HCI Drive - Accueil";
	$_SESSION['isConnected'] = true;
	$_SESSION['username'] = $data['prenomclient']." ".$data['nomClient'];
}
else {
	// Identification failure
	$_SESSION['section'] = "./echecConnexion.php";
	$_SESSION['titre'] = "HCI Drive - Echec";
}

header("Location: ../views/gabarit.php");
