<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Hygi&egrave";
$_SESSION['section'] = "./rayon.php";

$_SESSION['nomRayon'] = "Hygiene";

header("Location: ./gabarit.php");
