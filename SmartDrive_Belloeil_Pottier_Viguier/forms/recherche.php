<?php
session_start();

print_r($_POST);

$_SESSION['section'] = "./rayon.php";
$_SESSION['titre'] = "HCI Drive - Recherche";
$_SESSION['nav'] = "Recherche";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['recherche'] = $_POST['recherche'];

if(isset($_SESSION['nomRayon']))
	unset($_SESSION['nomRayon']);

header("Location: ../views/gabarit.php");
