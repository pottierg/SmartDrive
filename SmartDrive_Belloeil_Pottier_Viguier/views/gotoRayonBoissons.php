<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Boissons";
$_SESSION['section'] = "./rayon.php";

$_SESSION['nomRayon'] = "Boissons";

header("Location: ./gabarit.php");
