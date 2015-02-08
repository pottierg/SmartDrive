<?php

session_start();

$_SESSION['titre'] = "HCI Drive - Panier";
$_SESSION['section'] = "./historiqueCommande.php";
$_SESSION['nav'] = "Historique Commande";

unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

header("Location: ./gabarit.php");

?>