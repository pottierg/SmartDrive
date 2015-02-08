<?php

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

// ID du client
$sqlUser = "SELECT idClient FROM Client WHERE emailClient ='".$_SESSION['userMail']."'";
$reqUser = mysqli_query($link, $sqlUser);
		
// Liste des commandes
if($reqUser != false){
	$rowUser = mysqli_fetch_array($reqUser);
	$sqlCommande = "SELECT * FROM Commande WHERE Client_idClient =".$rowUser['idClient'];
	$reqCommande = mysqli_query($link, $sqlCommande);
}

// Affichage
if($reqCommande != false){
	echo "<ul class=\"tabs vertical\" data-tab>";
	
	while($rowCommande = mysqli_fetch_array($reqCommande)) {
		$sql = "SELECT * FROM Drive WHERE idDrive=".$rowCommande['Drive_idDrive'];
		$reqDrive = mysqli_query($link, $sql);
		$drive = mysqli_fetch_array($reqDrive);
		
		$sqlListeProduit = "SELECT * FROM ProduitCommande, Produit WHERE Commande_idCommande = ".$rowCommande['idCommande']." AND ProduitCommande.Produit_idProduit = Produit.idProduit";
		$reqListeProduit = mysqli_query($link, $sqlListeProduit);
		if ($reqListeProduit != false && $reqDrive != false) {
?>
	<li style="width: 13em;" class="tab-title<?php if(!isset($activeIsSet)) {$activeIsSet=true; echo " active";} ?>">
		<a href="#panel<?php echo $rowCommande['idCommande']; ?>">
		<?php echo $drive['nomDrive']; ?>
		<br>
		<?php
			$splitted = explode(' ', $rowCommande['dateCommande']);
			echo $splitted[0];
		?>
		<br>
		<?php 
			$prixTotal = 0;
			while($rowProduit = mysqli_fetch_array($reqListeProduit)){
				$prixTotal = $prixTotal + $rowProduit['prixProduit'] * $rowProduit['nombreProduitCommande'];
			} 
			echo "Montant : ".$prixTotal."&euro;";
		?>
		</a>
	</li>
<?php
		}
	}
	echo "</ul>\n";
	echo "<div class=\"tabs-content\">\n";
	unset($activeIsSet);
	$reqCommande = mysqli_query($link, $sqlCommande);
	if($reqCommande != false) {
		while($rowCommande = mysqli_fetch_array($reqCommande)) { ?>
			<div class="content<?php if(!isset($activeIsSet)) {$activeIsSet=true; echo " active";} ?>" id="panel<?php echo $rowCommande['idCommande']?>">
				<ul style="position: relative; left: 20%;">
					<?php 
						$sqlListeProduit = "SELECT * FROM ProduitCommande, Produit WHERE Commande_idCommande=".$rowCommande['idCommande']." AND ProduitCommande.Produit_idProduit = Produit.idProduit";
						$reqListeProduit = mysqli_query($link, $sqlListeProduit);
						if ($reqListeProduit != false) {
							while($rowProduit = mysqli_fetch_array($reqListeProduit)){
								echo "<li>".$rowProduit['nomProduit']." : ".$rowProduit['nombreProduitCommande']."</li>";
							}
						}
					?>
				</ul>
				
				<div class="row" style="position: relative; left: 20%;">
					<div class="large-6 columns">
						<form action="#" method="post">
							<input type="hidden" value="<?php echo $rowCommande['idCommande'];?>">
							<input type="submit" class="button radius" value="Recommander">
						</form>
					</div>
				</div>
				
			</div>
	<?php 
		}
	}
	echo "</div>";
} 

?>
