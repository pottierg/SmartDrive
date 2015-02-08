<?php

include_once('../utils/cart.php');

if(!isset($_SESSION['isConnected'])) {
?>
<!-- Si l'utilisateur n'est pas connecté -->
	<div class="row">
		<div class="large-12 columns">
			<div data-alert class="alert-box alert round">
			  Vous n'&ecirctes pas connect&eacute(e). Veuillez vous connecter ou vous inscrire.
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<ul class="button-group radius">
				<li><a href="./gotoConnexion.php" class="button radius">Se connecter</a></li>
				<li><a href="./gotoInscription.php" class="button radius">S'inscrire</a></li>
			</ul>
		</div>
	</div>
<?php }
else if(!isset($_SESSION['chosenDrive'])) { ?>
<!-- Si l'utilisateur n'a pas choisi son drive -->
	<div class="row">
		<div class="large-12 columns">
			<div data-alert class="alert-box alert round">
			  Aucun drive n'est saeacutel&eacutelectionn&eacute. Choisissez-en un.
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-6 columns large-offset-1">
			<a href="./choixDrive.php" class="small button radius">Choisir un drive</a>
		</div>
	</div>
<?php }
else if(!isset($_SESSION['cart'])) {
?>
<!-- Si le panier est vide -->
	<div class="row">
		<div class="large-12 columns">
			<div data-alert class="alert-box alert round">
			  Votre panier est vide.
			</div>
		</div>
	</div>
<?php }
else {
	$cart = unserialize($_SESSION['cart']);
	if($cart->isEmpty()) {
?>
<!-- Si le panier est vide -->
	<div class="row">
		<div class="large-12 columns">
			<div data-alert class="alert-box alert round">
			  Votre panier est vide.
			</div>
		</div>
	</div>
<?php }
else {
?>
<!-- Ok -->
<form method="post" action="../forms/reglement.php">
	<div class="row">
		<div class="large-12 columns">
			  <fieldset style="color: #008FB3;">
			    <legend>Informations de carte bleue</legend>
			
			    <div class="row">
				    <div class="large-12 columns">
				      <div class="row collapse prefix-radius">
				        <div class="small-3 columns">
				          <span class="prefix">Num&eacutero de carte</span>
				        </div>
				        <div class="small-9 columns">
				          <input type="text" id="numCB" required pattern="[0-9]{16}">
				        </div>
				      </div>
				    </div>
			    </div>
			    
			    <div class="row">
			    	<div class="large-6 columns">
			      	<div class="row collapse prefix-radius">
				        	<div class="small-5 columns">
				          	<span class="prefix">Date de validit&eacute</span>
				        	</div>
				        	<div class="small-7 columns">
				          	<input type="date" id="dateCB" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{2}">
							</div>
						</div>
					</div>
					<div class="large-6 columns">
						<div class="row collapse postfix-radius">
							<div class="small-4 columns">
								<input type="text" id="codeCB" placeholder="123" required pattern="[0-9]{3}">
							</div>
							<div class="small-8 columns">
								<span class="postfix">Cryptogramme visuel</span>
							</div>
						</div>
					</div>
				</div>
				
				<br>
			</fieldset>
		</div>
	</div>
	
	<div class="row">
		<div class="large-12 columns">
			<fieldset>
			    <legend style="color: #008FB3;">Informations sur le drive choisi</legend>
				<div class="row">
					<div class="row">
						<div class="large-12 columns">Le drive que vous avez choisi est :</div>
					</div>
					<div class="row">
						<div class="large-12 columns"><b><?php echo $_SESSION['chosenDrive']['nomDrive']; ?></b></div>
					</div>
					<div class="row">
						<div class="large-12 columns"><b>Adresse :</b> <?php echo $_SESSION['chosenDrive']['numeroAdresse']; ?> <?php echo $_SESSION['chosenDrive']['rueAdresse']; ?>
					<?php echo $_SESSION['chosenDrive']['codePostalAdresse']; ?> <?php echo $_SESSION['chosenDrive']['villeAdresse']; ?></div>
					</div>
					<div class="row">
						<div class="large-12 columns"><b>Horaires d'ouverture :</b> 9h - 18h du Lundi au Samedi</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	
	<div class="row">
		<div class="large-8 columns large-offset-4">
			<ul class="button-group radius">
				<li><a href="./choixDrive.php" class="button">Changer de drive</a></li>
				<li><input type="submit" class="button" value="Confirmer"></li>
			</ul>
		</div>
	</div>
</form>
<?php }
} ?>