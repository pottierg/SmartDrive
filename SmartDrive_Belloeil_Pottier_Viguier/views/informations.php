<?php 
	if(isset($_SESSION['chosenDrive'])) { ?>
		Le drive que vous avez choisi est : <br>
		<b><?php echo $_SESSION['chosenDrive']['nomDrive']; ?></b><br>
		<b>Adresse :</b> <?php echo $_SESSION['chosenDrive']['numeroAdresse']; ?> <?php echo $_SESSION['chosenDrive']['rueAdresse']; ?>
		<?php echo $_SESSION['chosenDrive']['codePostalAdresse']; ?> <?php echo $_SESSION['chosenDrive']['villeAdresse']; ?><br>
		<b>Horaires d'ouverture :</b> 9h - 18h du Lundi au Samedi<br>
		<br>
		<div class="row">
			<div class="large-6 columns">
				<a href="./choixDrive.php" class="button radius">Choisir un autre drive</a>
			</div>
		</div>
	<?php 	
	}
	else { ?>
		Aucun drive n'a &eacutet&eacute s&eacutelectionn&eacute. Veuillez en choisir un.
		<div class="row">
			<div class="large-6 columns large-offset-1">
				<a href="./choixDrive.php" class="small button radius">Choisir un drive</a>
			</div>
		</div>
	<?php }
?>