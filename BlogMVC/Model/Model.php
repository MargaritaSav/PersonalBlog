<?php

abstract class Model{
	private $db;

	protected function executeRequest($sql, $params = null){
		if ($params == null) {
	      $result = $this->getDb()->query($sql);    // exécution directe
	    }
	    else {
	      $result = $this->getDb()->prepare($sql);  // requête préparée
	      $result->execute($params);
	    }
	    return $result;
  }
	// Effectue la connexion à la BDD
	// Instancie et renvoie l'objet PDO associé
	private function getDb() {
		if($this->db==null){
			$this->db = new PDO('mysql:host=localhost;dbname=jf_novel;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
	  return $this->db;
	}

	protected function sanitize($string){
		$result = htmlspecialchars($string);
		return addslashes($result);
	}

	

}
