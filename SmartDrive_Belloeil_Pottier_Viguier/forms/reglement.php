<?php
session_start();

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

$sql = "SELECT * FROM Client WHERE ";
$sql .= "emailClient='".$_SESSION['userMail']."'";

$req = mysqli_query($link, $sql);
if($req != false) {
	$data = mysqli_fetch_array($req);
	$idclient = $data['idClient'];
}
else {
	echo "select client echoue";
	/*
	$_SESSION['titre'] = "HCI Drive - Commande";
	$_SESSION['section'] = "./commandeKO.html";
	$_SESSION['nav'] = "Commande";
	unset($_SESSION['navLink']);
	unset($_SESSION['nav2']);
	header("Location: ../views/gabarit.php");
	*/
}


include_once('../utils/article.php');
include_once('../utils/cart.php');

if(isset($_SESSION['cart'])){
	$cart = unserialize($_SESSION['cart']);
}

$success = $cart->registerToDatabase($_SESSION['chosenDrive']['idDrive'], $idclient);

if($success == false) {
	$_SESSION['titre'] = "HCI Drive - Commande";
	$_SESSION['section'] = "./commandeKO.html";
	$_SESSION['nav'] = "Commande";
	unset($_SESSION['navLink']);
	unset($_SESSION['nav2']);
	header("Location: ../views/gabarit.php");
}
else {
	unset($_SESSION['cart']);
	$_SESSION['titre'] = "HCI Drive - Commande";
	$_SESSION['section'] = "./commandeOK.html";
	$_SESSION['nav'] = "Commande";
	unset($_SESSION['navLink']);
	unset($_SESSION['nav2']);
	header("Location: ../views/gabarit.php");
}
