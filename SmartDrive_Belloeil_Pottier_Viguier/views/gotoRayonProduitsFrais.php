<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Produits Frais";
$_SESSION['section'] = "./rayon.php";
$_SESSION['nav'] = "Produits Frais";
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);

$_SESSION['nomRayon'] = "Produit";

header("Location: ./gabarit.php");
