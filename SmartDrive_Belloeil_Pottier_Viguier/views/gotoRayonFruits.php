<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Fruits et l&eacutegumes";
$_SESSION['section'] = "./rayon.php";

$_SESSION['nomRayon'] = "Fruits";

header("Location: ./gabarit.php");
