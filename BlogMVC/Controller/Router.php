<?php

require_once 'Controller/ControllerHomepage.php';
require_once 'Controller/ControllerChapter.php';
require_once 'Controller/Backend/ControllerAdmin.php';
require_once 'View/View.php';

class Router{

	private $ctrlHomepage;
	private $ctrChapter;
	private $ctrAdmin;

	public function __construct(){
		$this->ctrlHomepage = new ControllerHomepage();
		$this->ctrChapter = new ControllerChapter();
		$this->ctrAdmin = new ControllerAdmin();
	}

	public function routerRequest(){
		try{
			if (isset ($_GET['action'])) {
				
				if($_GET['action'] == 'chapter') {
					$idChapter = intval($this->getParameter($_GET,'id'));
					if($idChapter!=0){
						$this->ctrChapter->getChapterPage($idChapter);
					} else{
						throw new Exception("Id de billet non valide");	
					}

				} elseif($_GET['action'] == 'comment'){
					$author = $this->getParameter($_POST, 'author');
					$content = $this->getParameter($_POST, 'comment');
					$idChapter = $this->getParameter($_POST, 'id');
					$uniqid =  $this->getParameter($_POST, 'uniqid');
					$this->ctrChapter->sendComment($author, $content, $idChapter, $uniqid);

				} elseif($_GET['action'] == 'report'){
					$idComment = intval($this->getParameter($_GET,'id_com'));
					$idChapter = intval($this->getParameter($_GET,'id_chapter'));
					$this->ctrChapter->reportComment($idComment, $idChapter);

				} elseif($_GET['action']=="admin_login"){
					require_once 'View/Backend/viewAuthorization.php';
					if (isset($_GET['session']) && $_GET['session']==0) {
						$this->ctrAdmin->disconnectAdmin();
					}

				} elseif ($_GET['action']=='admin') {
					session_start();
					if (isset($_SESSION['id']) && isset($_SESSION['login'])) {
						$this->ctrAdmin->getAdminPage();		
					} elseif(isset($_POST['admin_login'])){
						$login = $this->getParameter($_POST,'admin_login');
						$password = $this->getParameter($_POST,'password');
						$this->ctrAdmin->connectAdmin($login, $password);
					} else
					require_once 'View/Backend/viewAuthorization.php';

				} elseif($_GET['action']=='delete'){
					if (isset($_GET["chapter_id"])) {
						session_start();
						$idChapter = intval($_GET["chapter_id"]);
						$this->ctrChapter->removeChapter($idChapter);
						header("Location: index.php?action=admin");
					} elseif (isset($_GET['option'])) {
						$idComment = intval($this->getParameter($_GET, 'id')) ;
						 if($_GET['option']==0){
							$this->ctrChapter->unreportComment($idComment);
							header("Location: index.php?action=admin&name=comments");
						}elseif ($_GET['option']==1){
							$this->ctrChapter->removeComment($idComment);
							header("Location: index.php?action=admin&name=comments");
						}
					}
					
				} elseif ($_GET['action']=='edit') {
					if (isset($_GET['name'])) {
						if ($_GET['name']=="modify" && !isset($_GET['option'])) {
							$idChapter = intval($this->getParameter($_GET,'id'));
							$this->ctrChapter->getEditPage($idChapter);
						}elseif($_GET['name']=="create" && !isset($_GET['option'])){
							$this->ctrChapter->getEditPage();
						}
						if (isset($_GET['option'])) {
							$date = $this->getParameter($_POST, 'publish_time');
							$title = $this->getParameter($_POST, 'titre');
							$content = $this->getParameter($_POST, 'content');
							$idChapter = $this->getParameter($_POST, 'id');

							if($_GET['option']==0){
								$this->ctrChapter->saveChapter($date, $title, $content);
							}elseif ($_GET['option']==1){
								$this->ctrChapter->modifyChapter($date, $title, $content, $idChapter);
							}	
						}
					}			
				} 
			else{
				throw new Exception("Action non valide");
			} 
		}else{
			$this->ctrlHomepage->getHomepage();
		}
		} catch (Exception $e){
			 $this->error($e->getMessage());
		}
	}

	private function error($errorMsg) {
    $view = new View("Error");
    $view->generate(array('errorMsg' => $errorMsg));
  	}

  	private function getParameter($array, $name) {
        if (isset($array[$name])) {
            return $array[$name];
        }
        else
            throw new Exception("Paramètre '$name' absent");
    }


}