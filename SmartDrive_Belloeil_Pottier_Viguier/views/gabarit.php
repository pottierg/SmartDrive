<?php 
	session_start();

	include_once('../utils/article.php');
	include_once('../utils/cart.php');

	$content = $_SESSION['section'];
	$titre = $_SESSION['titre'];
	if(isset($_SESSION['cart'])){
		$cart = $_SESSION['cart'];	
	}
?>
<!DOCTYPE html>
<html lang="fr">
 <head>
 
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="../img/Logo.ico">
	<title><?php echo $titre; ?></title>
	<link rel="stylesheet" href="../css/foundation.css" />
	<link rel="stylesheet" href="../css/drivestyles.css" />
	<link rel="stylesheet" href="../utils/slick/slick.css"/>
	
</head>
<body>
<br>

<div id="header" class="row">

	<div id="logo" class="large-3 columns">
		<a href="../index.php">
			<img height="100%" width="100%" alt="Logo" src="../img/Logotype-01.png">
		</a>
	</div>
	
	<div id="research" class="large-4 large-offset-1 columns" style="margin-top: 35px;">
		<form method="POST" action="../forms/recherche.php">
			<div class="row">
				<div class="large-12 columns">
					<div class="row collapse">
						<div class="small-10 columns">
							<input type="text" name="recherche" id="recherche" placeholder="Cherchez un article">
						</div>
						<div class="small-2 columns">
							<input type="submit" class="button postfix" value="Go">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<?php if (!isset($_SESSION['isConnected'])) : ?>
	<div id="login" class="large-4 columns" style="margin-top: 30px;">
		<ul class="button-group round" style="float: right;">
			<li><a href="./gotoInscription.php" class="small button info">Inscription</a></li>
			<li><a href="./gotoConnexion.php" class="small button info">Connexion</a></li>
		</ul>
	</div>
	<?php else: ?>
	<div id="login" class="large-4 columns" style="margin-top: 30px;">
		<div class="row">
			<div class="small-6 columns" style="margin-top: 12px;">
				Bienvenue <?php echo $_SESSION['username'].' !';?>
			</div>
			<div class="small-6 columns">
				<a href="../forms/deconnexion.php" class="small radius button">D&eacuteconnexion</a>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
</div>


<div id="content" class="row collapse content">

	<div name="navbar">
	    <div class="large-12 columns">
		    <div class="row collapse">
				<ul class="breadcrumbs">
					<li><a href="../index.php">Accueil</a></li>
					<?php if(isset($_SESSION['nav'])) { echo "<li><a href='#'>".$_SESSION['nav']."</a></li>"; }?>
				</ul>
			</div>
		</div>
	</div>

	<div id="row">
		<div name="menubar radius" class="large-2 columns">
		
			<ul class="side-nav stack button-group radius" role="navigation">
				<li role="menuitem">
					
				<a href="#" data-options="align:right; is_hover:true; hover_timeout:200" data-dropdown="rayons" class="button">Rayons</a>
				<div id="rayons" class="f-dropdown large content" data-dropdown-content>
					<ul class="large-block-grid-3">
						<li><a href="./gotoRayonProduitsFrais.php"><img alt="Produits frais" src="../img/frais.png">Produits frais</a></li>
						<li><a href="./gotoRayonFruits.php"><img alt="Fruits et légumes" src="../img/fruitslegumes.png">Fruits et l&eacutegumes</a></li>
						<li><a href="./gotoRayonEpicerie.php"><img alt="Epicerie" src="../img/epicerie.png">Epicerie</a></li>
						<li><a href="./gotoRayonBoissons.php"><img alt="Boissons" src="../img/boissons.png">Boissons</a></li>
						<li><a href="./gotoRayonSurgeles.php"><img alt="Surgelés" src="../img/surgeles.png">Surgel&eacutes</a></li>
						<li><a href="./gotoRayonHygiene.php"><img alt="Hygiène" src="../img/hygiene.png">Hygi&egravene</a></li>
					</ul>
				</div>
					
				</li>
				<li role="menuitem"><a href="#" class="button">Promotions</a></li>
				<li role="menuitem"><a href="./gotoInformations.php" class="button">Informations</a></li>
				<li role="menuitem"><a href="#" class="button">Panier</a></li>
				<li role="menuitem"><a href="./gotoGestionCompte.php" class="button">Compte utilisateur</a></li>
			</ul>
		</div>
		
		<div name="dynamic_content" class="large-8 columns">
			<?php 
				include $content;
			?>
		</div>
		
		<div id="panier" class="large-2 columns clear_box_panier">
			<div id="content_panier" class="panier auto_scroll">
				<?php 
					if(isset($cart)) {
						$cart->display();
					}  
				?>
			</div>
			<div id="checkout_button" class="row">
				<div class="large-12 columns">
					<a href="../forms/reglement.php" class="button radius expand mid_align">R&eacutegler</a>
				</div>
			</div>
		</div>
	</div>
	
</div>

<div id="footer" class="row collapse" style="font-size: 80%;">

	<div id="about_us" class="large-4 columns text-justify">
		<b>&Agrave propos de nous</b><br>
		Ce site a &eacutet&eacute d&eacutevelopp&eacute dans le cadre des UE "Design Graphique",
		"Technologies Web", "G&eacutenie des syst&egravemes interactifs" et "Techniques d'interaction web" du M2 Interactions Homme-Machine.
	</div>
	
	<div id="about_drive" class="large-4 large-offset-1 columns">
		<?php if(isset($_SESSION['chosenDrive'])) :?>
			<b><?php echo $_SESSION['chosenDrive']['nomDrive']; ?></b><br>
			<b>Adresse :</b> <?php echo $_SESSION['chosenDrive']['numeroAdresse']; ?> <?php echo $_SESSION['chosenDrive']['rueAdresse']; ?>
			<?php echo $_SESSION['chosenDrive']['codePostalAdresse']; ?> <?php echo $_SESSION['chosenDrive']['villeAdresse']; ?><br>
			<b>Horaires d'ouverture :</b> 9h - 18h du Lundi au Samedi<br>
		<?php else: ?>
			Aucun drive n'est s&eacutelectionn&eacute.
		<?php endif; ?>
		<div class="row">
			<div class="large-8 columns large-offset-1">
				<a href="./choixDrive.php" class="small button radius">Choisir un autre drive</a>
			</div>
		</div>
	</div>
	
	<div id="legal" class="large-2 large-offset-1 columns">
		Ce site n'est pas distribu&eacute sous licence. Il utilise le framework Foundation 5.
	</div>
	
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../utils/slick/slick.min.js"></script>
<script type="text/javascript" src="../js/foundation.min.js"></script>
<script type="text/javascript" src="../js/cart.management.js"></script>
<script>
	$(document).foundation();
	$(document).foundation('alert', 'reflow');
</script>

</body>
</body>
</html>