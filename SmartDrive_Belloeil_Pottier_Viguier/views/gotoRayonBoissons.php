<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Boissons";
$_SESSION['section'] = "./rayon.php";
$_SESSION['nav'] = "Boissons";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['nomRayon'] = "Boissons";

header("Location: ./gabarit.php");
