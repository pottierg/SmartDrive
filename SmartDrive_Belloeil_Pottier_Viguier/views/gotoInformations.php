<?php
session_start();
$_SESSION['titre'] = "HCI Drive - Informations";
$_SESSION['section'] = "./informations.php";
$_SESSION['nav'] = "Informations";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);
header("Location: ./gabarit.php");