<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Epicerie";
$_SESSION['section'] = "./rayon.php";
$_SESSION['nav'] = "Epicerie";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['nomRayon'] = "Epicerie";

header("Location: ./gabarit.php");
