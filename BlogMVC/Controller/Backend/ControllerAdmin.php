<?php

require_once 'View/View.php';
require_once 'Model/Backend/Admin.php';
require_once 'Model/Chapter.php';
require_once 'Model/Comment.php';

class ControllerAdmin{
	private $admin;

	public function __construct(){
		$this->admin = new Admin();
		$this->chapter = new Chapter();
		$this->comment = new Comment();
	}

	public function connectAdmin($login, $password){
		
		$result = $this->admin->getAdmin($login);
		$isPasswordCorrect = password_verify($password, $result['pswd']);
		if ($isPasswordCorrect) {
		        $_SESSION['id'] = $result['id'];
		        $_SESSION['login'] = $login;
		        $this->getAdminPage();
		    }
		    else{
		    	header('Location: http://localhost/study/BlogMVC/index.php?action=admin_login&err=1');
		    }
		}

	public function getAdminPage(){
		
		if (isset($_GET["name"])&&$_GET["name"]=="comments") {
			$view = new View('AdminComments');
			$comments = $this->comment->getAllComments();
			$numberOfSignaledComments = $this->comment->getNumberOfSignaledComments();
			$view-> generate(array('comments' => $comments, "numberOfSignaledComments" => $numberOfSignaledComments));
		} else{
			$totalNumberOfChapters=$this->chapter->getNumberOfChapters();
			$view = new View('Admin');
			$chapters=$this->chapter->getChapters("desc", 0, $totalNumberOfChapters);
			$view-> generate(array('chapters' => $chapters));
		}
		
		
	}

	public function disconnectAdmin(){
		session_start();
		$_SESSION = array();
		session_destroy();
		
	}

	}

	