<?php
session_start();
$_SESSION['section'] = "./home.php";
$_SESSION['titre'] = "HCI Drive - Accueil";

unset($_SESSION['isConnected']);
unset($_SESSION['username']);


header("Location: ../views/gabarit.php");