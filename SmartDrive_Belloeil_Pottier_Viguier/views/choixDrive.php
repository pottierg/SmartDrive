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
    <title>IHM Drive | Welcome</title>
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
								{
									echo '<div class="row">';
									echo '<div class="large-10 large-offset-1 columns result_drive_search">';
									echo '<div class="row collapse">';
									
									echo '<div class="small-2 columns" style="padding-top: 8px; padding-bottom: 8px;">';
									echo ''.$data['codePostalAdresse'].'';
									echo '</div>';

									echo '<div class="small-2 columns" style="padding-top: 8px; padding-bottom: 8px;">';
									echo $data['villeAdresse'];
									echo '</div>';
									
									echo '<div class="small-6 columns" style="padding-top: 8px; padding-bottom: 8px;">';
									echo $data['numeroAdresse'].' '.$data['rueAdresse'];
									echo '</div>';
									
									echo '<div class="small-2 columns">';
									echo '<a href="gabarit.php" class="button small" style="margin-bottom: 0px;">Go</a>';
									echo '</div>';

									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							} else {
								echo '<center><h3 style="color: white;">Sorry! No Drive was found :(</h3></center>';
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
	  			<div class="small-10 small-offset-1 columns footer_box" style="">
	  				<h4>About Us</h4>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem deleniti accusantium quasi ab ad officia cupiditate sed aliquam nobis.
	  			</div>
	  		</div>

	  		<div class="large-4 columns footer_background_box">
	  			<div class="small-10 small-offset-1 columns footer_box">
	  				<h4>Opening Hours</h4>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem deleniti accusantium quasi ab ad officia cupiditate sed aliquam nobis. officia cupiditate sed aliquam nobis. 
	  				
	  			</div>
	  		</div>

	  		<div class="large-4 columns footer_background_box">
		  		<div class="small-10 small-offset-1 columns footer_box">
		  			<h4>Legal Informations</h4>
		  			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem deleniti accusantium quasi ab ad officia cupiditate sed aliquam nobis.
		  		</div>
		  	</div>
	  	</div>
	  </div>
	  <?php
		$db->closeConnection();
	  ?>
  </body>
</html>