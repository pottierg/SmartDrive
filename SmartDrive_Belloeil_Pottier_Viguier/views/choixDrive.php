<?php

include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';
$user = USERNAME;
$password = PASSWORD;

$db = DATABASE_NAME;
$host = SERVER;
$port = 8889;

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IHM Drive | Bienvenue</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/choix_drive.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

  	<div class="wrapper">

		  <div class="header">
			  <div class="row">
				  <div class="large-12 columns">
				  	<center>
				  		<img height="70%" width="70%" alt="Logo" src="../img/Logotype-01.png">
				  	</center>
				  </div>
			  </div>
		  </div>

		  <div class="content">
		  	<div class="row">
				<div class="large-10 large-offset-1 columns" id="drive_search">
					<div class="row" id="header_drive_search">
						<center>
							<form action="#" method="post">
								<div class="row">
									<div class="large-6 large-offset-3 columns">
										<div class="row collapse" id="bar_drive_search">
											<div class="small-10 columns">
												<input type="text" name="research" placeholder="Code postal, ville, adresse, ...">
											</div>
											<div class="small-2 columns">
												<button type="submit" class="postfix">Search</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</center>
					</div>
					<div class="row" id="content_drive_search">
						<?php
							if(isset($_POST['research'])) {
								$sql = "SELECT * FROM `Adresse` WHERE `villeAdresse` LIKE \"%".$_POST['research']."%\" ".
								"OR `codePostalAdresse` LIKE \"%".$_POST['research']."%\" ".
								"OR `rueAdresse` LIKE \"%".$_POST['research']."%\" ".
								"AND `idAdresse` IN (SELECT `Adresse_idAdresse` FROM Drive)";
							} else {
								$sql = "SELECT * FROM `Adresse` WHERE `idAdresse` IN (SELECT `Adresse_idAdresse` FROM Drive)";
							}

							if($req = mysqli_query($link, $sql)) {
								while($data = mysqli_fetch_assoc($req))
								{ ?>
									<div class="row">
										<div class="large-10 large-offset-1 columns result_drive_search">
											<div class="row collapse">
											
												<div class="small-2 columns" style="padding-top: 8px; padding-bottom: 8px;">
													<?php echo ''.$data['codePostalAdresse'].''; ?>
												</div>
			
												<div class="small-2 columns" style="padding-top: 8px; padding-bottom: 8px;">
													<?php echo $data['villeAdresse']; ?>
												</div>
												
												<div class="small-6 columns" style="padding-top: 8px; padding-bottom: 8px;">
													<?php echo $data['numeroAdresse'].' '.$data['rueAdresse']; ?>
												</div>
												
												<div class="small-2 columns">
													<form method="post" action="../forms/choixDrive.php">
														<input type="hidden" name="chosenAdresseId" value="<?php echo $data['idAdresse']; ?>">
														<input type="submit" class="button radius small" style="margin-bottom: 0px;" value="Go">
													</form>
												</div>
		
											</div>
										</div>
									</div>
								<?php }
							} else {
								echo '<center><h3 style="color: white;">D&eacutesol&eacute ! Aucun drive trouv&eacute.</h3></center>';
							}
						?>
					</div>
		    	</div>
		  	</div>
		  	<div class="push"></div>
		  </div>
		  <br/>
	  </div>

	  <div class="footer">
	  	<div class="row">
	  		<div class="large-4 columns footer_background_box">
	  			<div class="small-10 small-offset-1 columns footer_box">
	  				<h4>&Agrave propos de nous</h4>
	  				Ce site a &eacutet&eacute d&eacutevelopp&eacute dans le cadre des UE "Design Graphique",
					"Technologies Web", "G&eacutenie des syst&egravemes interactifs" et "Techniques d'interaction web"
					du M2 Interactions Homme-Machine.
	  			</div>
	  		</div>

	  		<div class="large-4 columns footer_background_box">
	  			<div class="small-10 small-offset-1 columns footer_box">
	  				<h4>Horaires d'ouverture :</h4>
	  				9h - 18h du Lundi au Samedi
	  			</div>
	  		</div>

	  		<div class="large-4 columns footer_background_box">
		  		<div class="small-10 small-offset-1 columns footer_box">
		  			<h4>Informations l&eacutegales</h4>
		  			Ce site n'est pas distribu&eacute sous licence. Il utilise le framework Foundation 5.
		  		</div>
		  	</div>
	  	</div>
	  </div>
	  <?php
		$db->closeConnection();
	  ?>
  </body>
</html>