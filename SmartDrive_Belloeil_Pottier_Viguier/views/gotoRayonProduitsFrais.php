<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Produits Frais";
$_SESSION['section'] = "./rayon.php";

$_SESSION['nomRayon'] = "Produits Frais";

header("Location: ./gabarit.php");
