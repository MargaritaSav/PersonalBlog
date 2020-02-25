<?php 
	$title =null;
	$content = null;
	$date = null;
	$id =null;
	$action = 'index.php?action=edit&amp;name=create&amp;option=0';
	$label='Ajouter un nouveau chapitre';
	$success_message = null;
	$success_id = "hidden";
	if(isset($chapter)){
		$this->title = "Mon Blog - " . $chapter['title'];
		$title = $chapter['title'];
		$content = $chapter['content'];
		$date = substr($chapter['date'], 0, 10) . 'T' . substr($chapter['date'], -8, 5);
		$id = $chapter['id'];

	} else $this->title = "Nouveau chapitre";

	if (isset ($_GET['name'])&&$_GET['name']=='modify') {
		$action = "index.php?action=edit&amp;name=modify&amp;option=1&amp;id=$id";
		$label = "Modifier ce chapitre";
	}
		if (isset($_GET['option'])) {
			$success_id = "success-message";
			$_GET['option'] == 0 ? $success_message = "Un nouvaeu chapitre ajouté avec succès" : $success_message = "Ce chapitre a été modifié";
	}
	 ?>
	<script src="https://cdn.tiny.cloud/1/t8qbdrhx3h34hk7oaombflmg2jsdnngx6zng3bnpcvu5lell/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
      tinymce.init({
        selector: '#mytextarea',
         height: 800
      });
    </script>

<div id="edit-form">
	<div class="alert alert-success" role="alert" id="<?= $success_id ?>">
  		<?= $success_message?>
	</div>
	<form method="post" action="<?=$action?>">
		<input type="hidden" name="id" value="<?=$id ?>" />
		<label for="titre-edit">Titre</label>
		<input type="text" name="titre" id="titre-edit" value="<?=$title?>" required>
    	<textarea id="mytextarea" name="content" required>
    		<?= $content; ?>	  
    	</textarea>
    	<label for="datetime">Date de publication</label>
    	<input type="datetime-local" name="publish_time" value="<?=$date?>" id="datetime" required></br>
    	<input type="submit" name="submit" id="submit-edit" value="<?= $label?>">
    	<a href="index.php?action=admin" id="cancel-edit">Annuler</a>
  	</form>
  <div id="result"></div>
</div>


