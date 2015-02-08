<?php

session_start();

$_SESSION['titre'] = "HCI Drive - Historique des Commandes";
$_SESSION['section'] = "./historiqueCommande.php";
$_SESSION['nav'] = "Gestion de compte";

$_SESSION['navLink'] = "./gotoGestionCompte.php";
$_SESSION['nav2'] = "Historique des commandes";
header("Location: ./gabarit.php");