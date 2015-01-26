<?php
session_start();
$_SESSION['titre'] = "HCI Drive - Produits Frais";
$_SESSION['section'] = "./rayonProduitsFrais.html";

$_SESSION['nomRayon'] = "Produits Frais";

header("Location: ./gabarit.php");
?>
