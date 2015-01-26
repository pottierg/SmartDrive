<?php
	include_once '../databaseUtils/constantes.php';
	include_once '../databaseUtils/Database.class.php';
	
	$db = new Database();
	$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);
	
	if(isset($_SESSION['nomRayon']))
		$sql = "SELECT * FROM `Produits` WHERE `Rayon_idRayon` = (SELECT `idRayon` FROM Rayon WHERE nomRayon LIKE '".$_SESSION['nomRayon']."')";
	else if(isset($_SESSION['rechercheProduit']))
		$sql = "SELECT * FROM `Produits` WHERE `nomProduit` LIKE '%".$_SESSION['rechercheProduit']."%'";
	?>
	<ul class="small-block-grid-3">
	<?php 
	
	if($req = mysqli_query($link, $sql)) {
		while($data = mysqli_fetch_assoc($req)) : ?>
		<div>
			
		</div>
		<?php endwhile;
	} ?>
	</ul>
