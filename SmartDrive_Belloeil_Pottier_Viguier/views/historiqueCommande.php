<?php
session_start();

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

//Je créer ma requete sql qui me permet de récupérer les commande de l'utilisateur

$sqlUser = "";
$sqlCommande = "";
$sqlListeProduit = "";
$reqUser = "";
$reqCommande = "";
$reqListeProduit = "";

//Je recupere l'id du client
$sqlUser = "SELECT idClient FROM Client WHERE emailClient ='".$_SESSION['email']."'";
$reqUser = mysqli_query($link, $sqlUser);
		

//Je vais maintenant recupere les commande et l'ensemble des produits de celle ci
if($reqUser != false){
	$rowUser = mysqli_fetch_array($reqUser);
	$sqlCommande = "SELECT * FROM Commande WHERE Client_idClient ='".$rowUser['idClient'];
	$reqCommande = mysqli_query($link, $sqlCommande);
}

//Je recupere le resultat des commande
if($reqCommande != false){
	//J'affiche l'ensemble des idcommande avec les produits contenu dans ceux ci
	while($rowCommande = mysqli_fetch_array($reqCommande)) {
		$sqlListeProduit = "SELECT * FROM ProduitCommande, Produit WHERE Commande_idCommande = ".$rowCommande['idCommande']." AND ProduitCommande.Produit_idProduit = Produit.idProduit";
		$reqListeProduit = mysqli_query($link, $sqlListeProduit);
		if ($reqListeProduit != false){
?>
			<div class="affichageHistoriqueCommande">
				<?php echo $rowCommande['dateCommande'];?>
				<?php echo $rowCommande['idDrive'];?>
				<?php echo $rowCommande['idDrive'];?>
				<!-- Je calcul le total des produits -->
				<?php 
				$prixTotal = 0;
				while($rowProduit = mysqli_fetch_array($reqProduit)){
					$prixTotal = $prixTotal + $rowProduit['prixProduit'];
				} 
				echo $prixTotal;
				?>
			
			
			<!--GUILLAUME : L'ensemble des produit de cette commande se trouve dans $rowProduit si ensuite tu veux les afficher par un clique-->
			</div>
<?php
		}
	} 
} 
?>
