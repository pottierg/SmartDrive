<?php
session_start();

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

include_once '../utils/article.php';
include_once '../utils/cart.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

if(isset($_POST['idCommande'])) {
    $sql = "SELECT * FROM ProduitCommande, Produit WHERE Commande_idCommande=".$_POST['idCommande']." AND ProduitCommande.Produit_idProduit = Produit.idProduit";
    if($req = mysqli_query($link, $sql)) {
        $cart = new Cart();
        while($row = mysqli_fetch_array($req)) {
            for ($i = 0; $i < $row['nombreProduitCommande']; $i++) {
                $article = new Article($row['idProduit'], $row['nomProduit'], 1, $row['prixProduit']);
                $cart->addArticle($article);
            }
        }
        $_SESSION['cart'] = serialize($cart);
    }
}

$_SESSION['titre'] = "HCI Drive - Accueil";
$_SESSION['section'] = "./home.php";

unset($_SESSION['nav']);
unset($_SESSION['navLink']);
unset($_SESSION['nav2']);
header("Location: ./gabarit.php");