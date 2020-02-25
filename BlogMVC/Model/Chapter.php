<?php 
require_once 'Model/Model.php';

class Chapter extends Model {

	// Renvoie la liste de tous les billets, triés par identifiant décroissant
	public function getChapters($order, $start, $quantity) {
	  $sql = 'SELECT chapters.chapter_id AS id, DATE_FORMAT(chapter_date, \'%d/%m/%Y à %Hh%i\') AS date,'
	    . ' chapter_title AS title, chapter_content AS content, COUNT(comments.chapter_id) AS numOfComments'
	    .' FROM comments RIGHT JOIN chapters ON comments.chapter_id = chapters.chapter_id'
	    . ' GROUP BY chapters.chapter_id ORDER BY chapters.chapter_id'
	    . ' ' . $order . ' LIMIT ' . $quantity . ' OFFSET ' . $start;
	  $chapters = $this->executeRequest($sql);
	  return $chapters;
	}
	


	public function getChapter($idChapter) {
	  $sql = 'SELECT chapter_id AS id, chapter_date AS date,'
	    . ' chapter_title AS title, chapter_content AS content FROM chapters'
	    . ' WHERE chapter_id=?';
	  $chapter = $this->executeRequest($sql, array($idChapter));
	  if ($chapter->rowCount() == 1)
	    return $chapter->fetch();  // Accès à la première ligne de résultat
	  else
	   throw new Exception("Aucun billet ne correspond à l'identifiant '$idChapter'");
	}

	public function addChapter($date, $title, $content){
		$sql = 'INSERT INTO chapters (chapter_date, chapter_title, chapter_content) VALUES (?, ?, ?)';
		$this->executeRequest($sql, array($date, $title, $content));
	}

	public function updateChapter($date, $title, $content, $idChapter){
		$sql = 'UPDATE chapters SET chapter_date=?, chapter_title=?, chapter_content=? WHERE chapter_id=?';
		$this->executeRequest($sql, array($date, $title, $content, $idChapter));
	}

	public function deleteChapter($idChapter){
		$sql = 'DELETE FROM chapters WHERE chapter_id=?; DELETE FROM comments WHERE chapter_id=?;';
		return $this->executeRequest($sql, array($idChapter, $idChapter));
	}

	public function getLastChapterId(){
		$sql = 'SELECT chapter_id AS id FROM chapters ORDER BY chapter_id DESC LIMIT 1';
		$id =  $this->executeRequest($sql);
		return $id->fetch();
	}

	public function getNumberOfChapters(){
		$sql = 'SELECT * FROM chapters';
		$total = $this->executeRequest($sql);
		return $total->rowCount();
	}
	
}