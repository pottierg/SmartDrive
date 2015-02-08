<?php

session_start();

$_SESSION['titre'] = "HCI Drive - Historique des Commandes";
$_SESSION['section'] = "./historiqueCommande.php";
$_SESSION['nav'] = "Historique des Commandes";

unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

header("Location: ./gabarit.php");