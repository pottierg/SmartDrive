<?php

class Cart {
	private $list;

	function __construct() {
		$this->list = new arrayObject();
	}

	function addArticle($article) {
		$id = $article->getId();
		if($this->list->offsetExists($id)) {
			$quantity = $this->list->offsetGet($id)->getQuantity();
			$this->list->offsetGet($id)->setQuantity($quantity + 1);
			return 'ok';
		} else {
			$this->list->offsetSet($id, $article);
			return 'ko';
		}
	}

	function removeArticle($id) {
		if($this->list->offsetExists($id)) {
			$this->list->offsetUnset($id);
			return true;
		} else {
			return false;
		}
	}

	function display() {
		foreach ($this->list as $key => $article) {
			$article->display();
		}
	}

	function displayRow() {
		foreach ($this->list as $key => $article) {
			echo "<tr>";
			$article->displayRow($key);
			echo "</tr>";
		}
	}
	
	function isEmpty() {
		return $this->list->count() == 0;
	}
	
	function registerToDatabase($idDrive, $idClient) {
		include_once '../databaseUtils/constantes.php';
		include_once '../databaseUtils/Database.class.php';
		
		$db = new Database();
		$link = $db->connectToDatabase(SERVER, DATABASE_NAME, USERNAME, PASSWORD);
		$date = date("Y-m-d G:i:s");
		
		$sql = "INSERT INTO Commande (dateCommande, Drive_idDrive, Client_idClient) ";
		$sql .= "VALUES ('".$date."', ".$idDrive.", ".$idClient.")";
		if(false == mysqli_query($link, $sql))
			return false;
		
		$sql = "SELECT * FROM Commande WHERE dateCommande='".$date."' AND Client_idClient=".$idClient;
		$req = mysqli_query($link, $sql);
		if($req == false)
			return false;
		$data = mysqli_fetch_array($req);
		$idCommande = $data['idCommande'];
		
		foreach ($this->list as $key => $article) {
			if(false == $article->registerToDatabase($idCommande))
				return false;
		}
		
		return true;
	}
}
