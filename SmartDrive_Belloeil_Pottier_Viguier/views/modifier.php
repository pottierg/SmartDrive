<?php
include_once '../databaseUtils/constantes.php';
include_once '../databaseUtils/Database.class.php';

$db = new Database();
$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);

if(isset($_SESSION['isConnected'])) {
	$sql = "SELECT * FROM Client, Adresse WHERE Client.Adresse_idAdresse=Adresse.idAdresse ";
	$sql .= "AND emailClient='".$_SESSION['userMail']."'";
}

$req = mysqli_query($link, $sql);
if($req != false) {
	$data = mysqli_fetch_array($req);
	$_SESSION['idAdresse'] = $data['idAdresse'];
	$_SESSION['idClient'] = $data['idClient'];
?>
<form method="post" action="../forms/modifier.php">
	<fieldset>
		<legend style="color: #008FB3;">A propos de vous</legend>
		<div class="row">
			<div class="large-3 columns">
				<label for="nom" class="right inline" style="color: white;">Nom</label>
			</div>
			<div class="large-9 columns">
				<input type="text" id="nom" name="nom" value="<?php echo $data['nomClient']; ?>"  required pattern="[a-zA-Z]+">
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label for="prenom" class="right inline" style="color: white;">Pr&eacutenom</label>
			</div>
			<div class="large-9 columns">
				<input type="text" id="prenom" name="prenom" value="<?php echo $data['prenomClient']; ?>"  required pattern="[a-zA-Z]+">
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label for="mail" class="right inline" style="color: white;">Adresse email</label>
			</div>
			<div class="large-9 columns">
				<input type="email" id="mail" name="mail" value="<?php echo $data['emailClient']; ?>"  required>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label for="pwd" class="right inline" style="color: white;">Mot de passe</label>
			</div>
			<div class="large-9 columns">
				<input type="password" id="pwd" name="pwd" value="" required>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label for="phone" class="right inline" style="color: white;">T&eacutel&eacutephone</label>
			</div>
			<div class="large-9 columns">
				<input type="text" id="phone" name="phone" value="<?php echo $data['telephoneAdresse']; ?>"  pattern="[0-9]{9,11}">
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend style="color: #008FB3;">Votre adresse</legend>
		<div class="row">
			<div class="large-2 columns">
				<label for="norue" class="right inline" style="color: white;">Num&eacutero Rue</label>
			</div>
			<div class="large-2 columns">
				<input type="text" id="norue" name="norue" value="<?php echo $data['numeroAdresse']; ?>"  required pattern="[a-zA-Z0-9]+">
			</div>
			<div class="large-2 columns">
				<label for="nrue" class="right inline" style="color: white;">Nom rue</label>
			</div>
			<div class="large-6 columns">
				<input type="text" id="nrue" name="nrue" value="<?php echo $data['rueAdresse']; ?>" required pattern="[a-zA-Z0-9]+">
			</div>
		</div>
		<div class="row">
			<div class="large-2 columns">
				<label for="ville" class="right inline" style="color: white;">Ville</label>
			</div>
			<div class="large-4 columns">
				<input type="text" id="ville" name="ville" value="<?php echo $data['villeAdresse']; ?>" required pattern="[a-zA-Z0-9]+">
			</div>
			<div class="large-3 columns">
				<label for="cp" class="right inline" style="color: white;">Code postal</label>
			</div>
			<div class="large-3 columns">
				<input type="text" id="cp" name="cp" value="<?php echo $data['codePostalAdresse']; ?>" required pattern="[a-zA-Z0-9]+">
			</div>
		</div>
	</fieldset>
	<div class="row">
		<div class="large-4 large-centered columns">
			<button type="submit" class="radius">Enregistrer</button>
		</div>
	</div>
</form>
<?php }
else {
?>
<div data-alert class="alert-box alert round">
	Une erreur s'est produite lors du chargement de vos informations.
</div>
<?php } ?>