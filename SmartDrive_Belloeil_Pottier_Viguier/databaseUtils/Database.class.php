<?php
    class Database {
        private $mysqli;

        public function connectToDatabase ($server, $dbName, $login, $password) {
            $this->mysqli = new mysqli($server,$login,$password);
            
            if (mysqli_connect_errno()) {
                die('Connexion impossible : '.mysqli_connect_error());
            }
            
            if(false == $this->mysqli->select_db($dbName))
           		$this->createDatabase($dbName);
            
            return $this->mysqli;
        }
        
        public function closeConnection () {
            $this->mysqli->close();
        }
        
        public function executeQuery ($sqlQuery) {
            $result = $this->mysqli->query($sqlQuery);
            
            if (!$result) {
                die('Impossible d\'&eacutex&eacutecuter la requete '.$sqlQuery.' Error : '.$this->mysqli->error);
            }
            
            return $result;
        }
        
        
        private function executeMultiQuery($sqlQuery) {
	        	$result = $this->mysqli->multi_query($sqlQuery);
	        	while ($this->mysqli->more_results()) {$this->mysqli->next_result();} // flush multi_queries
	        	
	        	if (!$result) {
	        		die('Impossible d\'&eacutex&eacutecuter la requete '.$sqlQuery.' Error : '.$this->mysqli->error);
	        	}
        		return $result;
        }
        
        
        private function createDatabase($dbName) {
        	$this->mysqli->query("CREATE DATABASE IF NOT EXISTS `$dbName` ");
        	
            if(false != $this->mysqli->select_db($dbName))
            {
            	$sql = file_get_contents('../databaseUtils/bddrive.sql');
            	$this->executeMultiQuery($sql);
            	$sql = file_get_contents('../databaseUtils/adresse.sql');
            	$this->executeQuery($sql);
            	$sql = file_get_contents('../databaseUtils/drive.sql');
            	$this->executeQuery($sql);
            	$sql = file_get_contents('../databaseUtils/rayons.sql');
            	$this->executeQuery($sql);
            	$sql = file_get_contents('../databaseUtils/produits.sql');
            	$this->executeQuery($sql);
            }
        }
      
    }
?>