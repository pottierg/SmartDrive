<?php
session_start();
$_SESSION['titre'] = "HCI Drive - Gestion de compte";
$_SESSION['section'] = "./compte.php";
$_SESSION['nav'] = "Gestion de compte";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);
header("Location: ./gabarit.php");