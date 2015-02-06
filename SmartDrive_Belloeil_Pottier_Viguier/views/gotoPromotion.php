<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Promotion";
$_SESSION['section'] = "./promotion.php";
$_SESSION['nav'] = "Promotion";

unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

header("Location: ./gabarit.php");

?>