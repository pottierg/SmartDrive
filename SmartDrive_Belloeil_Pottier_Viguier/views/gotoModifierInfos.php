<?php
session_start();
$_SESSION['titre'] = "HCI Drive - Gestion de compte";
$_SESSION['section'] = "./modifier.php";
$_SESSION['nav'] = "Gestion de compte";
$_SESSION['navLink'] = "./gotoGestionCompte.php";
$_SESSION['nav2'] = "Modifier les informations personnelles";
header("Location: ./gabarit.php");