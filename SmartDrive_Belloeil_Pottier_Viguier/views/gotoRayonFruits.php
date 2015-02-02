<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Fruits et l&eacutegumes";
$_SESSION['section'] = "./rayon.php";
$_SESSION['nav'] = "Fruits et l&eacutegumes";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['nomRayon'] = "Fruits";

header("Location: ./gabarit.php");
