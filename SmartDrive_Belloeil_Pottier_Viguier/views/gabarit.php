<?php 
	session_start();
	$content = $_SESSION['section'];
	$titre = $_SESSION['titre']
?>
<!DOCTYPE html>
<html lang="fr">
 <head>
 
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $titre; ?></title>
	<link rel="stylesheet" href="../css/foundation.css" />
	<link rel="stylesheet" href="../css/drivestyles.css" />
	
	<script src="js/vendor/modernizr.js"></script>

</head>

<body>

<br>

<div id=header" class="row">

	<div id="logo" class="large-2 columns">
		<img height="200px" width="200px" alt="Logo" src="../img/LogoIHMDrive.jpg">
	</div>
	
	<div id="research" class="large-6 columns">
		<form name="research" action="#">
			<div class="row">
				<div class="large-12 columns">
					<div class="row collapse">
						<div class="small-10 columns">
							<input type="text" placeholder="Cherchez un article">
						</div>
						<div class="small-2 columns">
							<a href="#" class="button postfix">Go</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<div id="login" class="large-4 columns">
		<ul class="button-group round">
			<li><a href="#" class="small button info">Incription</a></li>
			<li><a href="#" class="small button info">Connexion</a></li>
		</ul>
	</div>
	
</div>


<div id="content" class="row collapse content">

	<div name="navbar">
	    <div class="large-12 columns">
		    <div class="row collapse">
				<ul class="breadcrumbs">
					<li><a href="#">Accueil</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div id="row">
		<div name="menubar" class="large-2 columns">
			<ul class="stack button-group radius">
				<li><a href="#" class="button">Rayons</a></li>
				<li><a href="#" class="button">Promotions</a></li>
				<li><a href="#" class="button">Informations</a></li>
				<li><a href="#" class="button">Panier</a></li>
				<li><a href="#" class="button">Compte utilisateur</a></li>
			</ul>
		</div>
		
		<div name="dynamic_content" class="large-8 columns">
			<?php 
				include $_SESSION['section'];
			?>
		</div>
		
		<div id="panier" class="large-2 columns clear_box_panier">
			<div id="content_panier" class="panier auto_scroll">
				
			</div>
			<div id="checkout_button" class="row">
				<div class="large-12 columns">
					<a href="#" class="button radius mid_align">R&eacutegler</a>
				</div>
			</div>
		</div>
	</div>
	
</div>

<div id="footer" class="row collapse" style="font-size: 80%;">

	<div id="about_us" class="large-4 columns text-justify">
		Ce site a &eacutet&eacute d&eacutevelopp&eacute dans le cadre des UE "Design Graphique",
		"Technologies Web", "G&eacutenie des syst&egravemes interactifs" et "Techniques d'interaction web" du M2 Interactions Homme-Machine.
	</div>
	
	<div id="about_drive" class="large-4 large-offset-1 columns">
		Drive s&eacutelectionn&eacute : <br>
		Adresse : <br>
		Horaires d'ouverture : <br>
	</div>
	
	<div id="legal" class="large-2 large-offset-1 columns">
		Ce site n'est pas distribu&eacute sous licence. Il utilise le framework Foundation 5.
	</div>
	
</div>

</body>
</html>