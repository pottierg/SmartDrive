<?php
session_start();

$_SESSION['titre'] = "HCI Drive - Surgel&eacutes";
$_SESSION['section'] = "./rayon.php";

$_SESSION['nomRayon'] = "Surgelés";

header("Location: ./gabarit.php");
