<?php

$user = 'root';
$password = 'root';

$db = 'bddrive';
$host = 'localhost';
$port = 8889;

$link = mysql_connect(
   "$host:$port", 
   $user, 
   $password
);

$db_selected = mysql_select_db(
   $db, 
   $link
);

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
				  		<h1>IHM Drive</h1>
				  	</center>
				  </div>
			  </div>
		  </div>

		  <div class="content">
		  	<div class="row">
					<div class="large-10 large-offset-1 columns" id="drive_search">
						<div class="row" id="header_drive_search">
							<center>
								<form name="research" action="#">
									<div class="row">
										<div class="large-6 large-offset-3 columns">
											<div class="row collapse" id="bar_drive_search">
												<div class="small-10 columns">
													<input type="text" placeholder="Code postal, ville, adresse, ...">
												</div>
												<div class="small-2 columns">
													<a href="#" class="button postfix">Go</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</center>
						</div>
						<div class="row" id="result_drive_search">

							<!-- Insérer le contenu dynamique lié a la recherche -->
							
						</div>
						<div class="row" id="footer_drive_search" >
							<!-- espace vide -->
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
  </body>
</html>