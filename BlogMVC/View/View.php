<?php
class View{

	  // Nom du fichier associé à la vue
	  private $file;
	  // Titre de la vue (défini dans le fichier vue)
	  private $title;

	  public function __construct($action) {
	    // Détermination du nom du fichier vue à partir de l'action
	    if (isset($_GET['action']) && $_GET['action']=='admin' || isset($_GET['action']) && $_GET['action']=='edit'){
	    	$this->file = "View/Backend/view" . $action . ".php";
	    } else
	    $this->file = "View/view" . $action . ".php";
	  }

	  // Génère et affiche la vue
	  public function generate($data) {
	    // Génération de la partie spécifique de la vue
	    $content = $this->generateFile($this->file, $data);
	    $template;
	    // Génération du gabarit commun utilisant la partie spécifique
	    if (isset($_GET['action']) && $_GET['action']=='admin' || isset($_GET['action']) && $_GET['action']=='edit') {
	    	$template = 'View/Backend/templateAdmin.php';
	    }else{
	    	$template='View/template.php';
	    }
	    $view = $this->generateFile($template,
	      array('title' => $this->title, 'content' => $content));
	    // Renvoi de la vue au navigateur
	    echo $view;
	  }

	  // Génère un fichier vue et renvoie le résultat produit
	  private function generateFile($file, $data) {
	    if (file_exists($file)) {
	      // Rend les éléments du tableau $donnees accessibles dans la vue
	      extract($data);
	      // Démarrage de la temporisation de sortie
	      ob_start();
	      // Inclut le fichier vue
	      // Son résultat est placé dans le tampon de sortie
	      require $file;
	      // Arrêt de la temporisation et renvoi du tampon de sortie
	      return ob_get_clean();
	    }
	    else {
	      throw new Exception("Fichier '$file' introuvable");
	    }
	  }
}