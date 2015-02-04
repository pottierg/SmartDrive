<?php
// If the user is connected
if(isset($_SESSION['isConnected'])) { ?>
	<div class="row">
		Vous &ecirctes connect&eacute en tant que : <?php echo $_SESSION['username']; ?>
	</div>
	<br>
	<div class="row">
	<div class="large-12 columns">
		<ul class="button-group radius">
			<li><a href="#" class="button radius">Commandes pr&eacutec&eacutedentes</a></li>
			<li><a href="./gotoModifierInfos.php" class="button radius">Modifier les informations</a></li>
		</ul>
	</div>
	</div>
	<?php 
}
else { ?>
	<div  class="row">
		Vous n'&ecirctes pas connect&eacute. Voulez-vous cr&eacuteer un compte ou vous connecter ?
	</div>
	<br>
	<div class="row">
		<div class="large-12 columns">
			<ul class="button-group radius">
				<li><a href="./gotoConnexion.php" class="button radius">Se connecter</a></li>
				<li><a href="./gotoInscription.php" class="button radius">S'inscrire</a></li>
			</ul>
		</div>
	</div>
<?php }
