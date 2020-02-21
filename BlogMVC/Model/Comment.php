<?php 
require_once 'Model/Model.php';

class Comment extends Model {

	// Renvoie la liste des commentaires associés à un billet
	public function getComments($idChapter) {
	  $sql = 'SELECT comment_id AS id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS date,'
	    . ' comment_author AS author, comment_content AS content, signaled AS signaled FROM comments'
	    . ' WHERE chapter_id=?';
	  $comments = $this->executeRequest($sql, array($this->sanitize($idChapter)));
	  return $comments;
	}

	public function createComment($author, $content, $idChapter, $uniqid){
		$sql = 'INSERT INTO comments (comment_date, comment_author, comment_content, chapter_id, uniqid) VALUES (NOW(), ?, ?, ?, ?)';
		$this->executeRequest($sql, array($this->sanitize($author), $this->sanitize($content), $this->sanitize($idChapter), $this->sanitize($uniqid)));
	}

	public function isSignaled($idComment, $param){
		$sql = 'UPDATE comments SET signaled = ? WHERE comment_id=?';
		$this->executeRequest($sql, array($this->sanitize($param), $this->sanitize($idComment)));		
	}

	public function getAllComments(){
		$sql = 'SELECT comment_id AS id, comment_date AS date,'
		. ' comment_author AS author, comment_content AS content,'
		. ' chapters.chapter_title AS chapter_title, signaled AS signaled FROM comments '
		. ' INNER JOIN chapters ON comments.chapter_id = chapters.chapter_id';		
	    $comments = $this->executeRequest($sql);
	  	return $comments;
	}

	public function deleteComment($idComment){
		$sql = 'DELETE FROM comments WHERE comment_id=?';
		$this->executeRequest($sql, array($this->sanitize($idComment)));
	}

	public function isCommentSent($uniqid){
		$sql = 'SELECT * FROM comments WHERE uniqid = ?';
		$result = $this->executeRequest($sql, array($this->sanitize($uniqid)));
		if ($result->rowCount() == 1) {
			return true;
		}
		return false;	
	}

	public function getNumberOfComments($idChapter){
		$sql = 'SELECT * FROM comments WHERE chapter_id = ?';
		$result = $this->executeRequest($sql, array($this->sanitize($idChapter)));
		return $result->rowCount();
	}

}