<?php
session_start();

$_SESSION['section'] = "./reglement.php";
$_SESSION['titre'] = "HCI Drive - Reglement";
$_SESSION['nav'] = "Reglement";

unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

header("Location: ../views/gabarit.php");
