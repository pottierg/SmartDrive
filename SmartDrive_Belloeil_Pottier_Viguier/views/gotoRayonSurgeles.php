<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Surgel&eacutes";
$_SESSION['section'] = "./rayon.php";
$_SESSION['nav'] = "Surgel&eacutes";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['nomRayon'] = "Surgel�s";

header("Location: ./gabarit.php");
