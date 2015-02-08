<?php

class Article {
	private $id;
	private $name;
	private $quantity;

	function __construct($id, $name, $quantity) {
		$this->id = $id;
		$this->name = $name;
		$this->quantity = $quantity;
	}

	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}

	function setName($name) {
		$this->name = $name;
	}

	function getQuantity() {
		return $this->quantity;
	}

	function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	function display()
	{
		echo "<div><b>" . $this->name . "</b> : " . $this->quantity . "</div>";
	}

	function displayRow($i) {
		echo "<td>$this->name</td>";
		echo "<td>$this->quantity</td>";
		echo "<td><div class='tiny button' onclick='removeArticle(".$i.");'>Supprimer</div></td>";
	}
	
	function registerToDatabase($idCommande) {
		include_once '../databaseUtils/constantes.php';
		include_once '../databaseUtils/Database.class.php';
		
		$db = new Database();
		$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);
		
		$sql = "SELECT * FROM Produit WHERE nomProduit='".$this->name."'";
		$req = mysqli_query($link, $sql);
		if($req == false)
			return false;
		$data = mysqli_fetch_array($req);
		$idProduit = $data['idProduit'];
		
		$sql = "INSERT INTO ProduitCommande VALUES (";
		$sql .= $this->quantity.", ".$idProduit.", ".$idCommande.")";
		if(false == mysqli_query($link, $sql))
			return false;
		
		return true;
	}
}
