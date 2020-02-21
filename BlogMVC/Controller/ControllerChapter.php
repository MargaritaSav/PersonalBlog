<?php

require_once 'View/View.php';
require_once 'Model/Chapter.php';
require_once 'Model/Comment.php';

class ControllerChapter{
	private $chapter;
	private $comment;

	public function __construct(){
		$this->chapter = new Chapter();
		$this->comment = new Comment();
	}

	public function getChapterPage($idChapter){
		$chapter = $this->chapter->getChapter($idChapter);
		$comments = $this->comment->getComments($idChapter);
		$view = new View('Chapter');
		$view->generate(array('chapter' => $chapter, 'comments' =>$comments));
	}

	public function sendComment($author, $content, $idChapter, $uniqid){
		if (!$this->comment->isCommentSent($uniqid)) {
			$this->comment->createComment($author, $content, $idChapter, $uniqid);
		}
		$this->getChapterPage($idChapter);
		
	}

	public function reportComment($idComment, $idChapter){
		$this->comment->isSignaled($idComment, 1);
		$this->getChapterPage($idChapter);
	}


	/*Admin's actions*/

	public function saveChapter($date, $title, $content){
		$idChapter = $this->chapter->addChapter($date, $title, $content);
		$idChapter = $this->chapter->getLastChapterId();
		$this->getEditPage($idChapter['id']);

	}

	public function removeChapter($idChapter){
		return $this->chapter->deleteChapter($idChapter);
	}

	public function modifyChapter($date, $title, $content, $idChapter){
		$this->chapter->updateChapter($date, $title, $content, $idChapter);
		$this->getEditPage($idChapter);
	}

	public function getEditPage($idChapter=null){
		$view = new View('Edit');
		if ($idChapter!=null) {
			$chapter = $this->chapter->getChapter($idChapter);
			$view->generate(array('chapter' => $chapter));
		} else{
			$view->generate(array(null));
		}
	}

	public function unreportComment($idComment){
		$this->comment->isSignaled($idComment, 0);
	}

	public function removeComment($idComment){
		$this->comment->deleteComment($idComment);
	}

}
