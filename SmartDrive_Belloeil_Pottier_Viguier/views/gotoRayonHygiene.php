<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Hygi&egrave";
$_SESSION['section'] = "./rayon.php";
$_SESSION['nav'] = "Hygi&egravene";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['nomRayon'] = "Hygiene";

header("Location: ./gabarit.php");
