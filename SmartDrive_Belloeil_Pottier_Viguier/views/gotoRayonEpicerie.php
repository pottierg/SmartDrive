<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Epicerie";
$_SESSION['section'] = "./rayon.php";

$_SESSION['nomRayon'] = "Epicerie";

header("Location: ./gabarit.php");
