<?php
session_start();

$_SESSION['section'] = "./reglement.html";
$_SESSION['titre'] = "HCI Drive - Reglement";

header("Location: ../views/gabarit.php");