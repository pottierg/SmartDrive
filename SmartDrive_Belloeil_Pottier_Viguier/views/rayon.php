<?php

$sql = "";

if(isset($_SESSION['nomRayon'])) {
	$sql = "SELECT * FROM Produit, Rayon WHERE Rayon_idRayon=";
	$sql .= "(SELECT idRayon FROM Rayon WHERE nomRayon LIKE '%".$_SESSION['nomRayon']."%') ";
	$sql .= "AND Produit.Rayon_idRayon=Rayon.idRayon";
}
else if(isset($_SESSION['recherche'])) {
	$sql = "SELECT * FROM Produit, Rayon WHERE nomProduit LIKE '%".$_SESSION['recherche']."%' ";
	$sql .= "OR descriptionProduit LIKE '%".$_SESSION['recherche']."%' ";
	$sql .= "AND Produit.Rayon_idRayon=Rayon.idRayon";
}

// Liste des articles
if($sql != "") {
	include_once '../databaseUtils/constantes.php';
	include_once '../databaseUtils/Database.class.php';
	
	$db = new Database();
	$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);
	$req = mysqli_query($link, $sql);
	
	if($req == false) {
		// Failure case
		?>
			<div id="alert-box" data-alert class="alert-box alert radius">
				Une erreur s'est produite avec la base de donn&eacutees.
			</div>
		<?php 
	}
	else {
		echo "<ul class=\"large-block-grid-3\">";
		// Display every article
		while($row = mysqli_fetch_array($req)) {
			?>
				<li>
					<div class="articleBackground<?php echo $row['idRayon']; ?>">
						<center>
							<div class="nomArticle" ><p><b><?php echo $row['nomProduit']; ?></b></p></div>
							<div class="imageArticle"><img src="../img/products/<?php echo $row['imageProduit']; ?>" alt="image article <?php echo $row['nomProduit']; ?>" height="100" width="150"></div>
							<div class="descriptionArticle"><p><?php echo $row['descriptionProduit']; ?></p></div>
							<div class="boutonAjouter"> <button type="button"><?php echo $row['prixProduit']; ?> &euro;</button></div>
						</center>
					</div>
				</li>
			<?php
		}
		echo "</ul>";
	}
}
else { ?>
<div id="alert-box" data-alert class="alert-box alert radius">
	Une erreur s'est produite avec la base de donn&eacutees.
</div>
<?php } ?>