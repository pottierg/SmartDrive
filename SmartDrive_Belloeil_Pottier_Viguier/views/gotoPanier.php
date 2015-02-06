<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Panier";
$_SESSION['section'] = "./panier.php";
$_SESSION['nav'] = "Panier";

unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

unset($_SESSION['nomRayon']);

header("Location: ./gabarit.php");

?>