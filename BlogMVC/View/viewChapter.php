<?php $this->title = "Mon Blog - " . $chapter['title']; ?>

<article class="chapter ">
  <header class="row">
  	<div class="title col-8">
  		<h1 class="titreBillet"><?= $chapter['title'] ?></h1>
  	</div>
  	<div class="info col-4">
  		<time><?= $chapter['date'] ?></time>
  	</div>
  </header>
  <p><?= $chapter['content'] ?></p>
</article>

<div id="title_com">
  <h2 id="titreReponses">Commentaires à <?= $chapter['title'] ?></h2>
</div>
<?php

foreach ($comments as $comment):
	$class_com;
	$text;
	$class_link;
	if ($comment['signaled']==1) {
		$class_com = "comment signaled";
		$text = "Signalé";
		$class_link = "disabled";	
	} else {
		$class_com = "comment";
		$text = "Signaler";
		$class_link="";
  }; ?>
  <div class="<?= $class_com?> ">
  	<header class="row">
      <div class="col-6">
        <p><?= $comment['author'] ?> : </p>
      </div>
      <div class="col-6">
        <p><?= $comment['date'] ?></p>
      </div> 		
  	</header>
    <div id="com_content" >
      <p ><?= $comment['content'] ?></p>
    </div>
  	
  	<footer class="comment-footer">
  		<a href="<?= "index.php?action=report&amp;id_chapter=" . $chapter['id'] . "&amp;id_com=" . $comment['id']?>" class="<?= $class_link?>"><?=$text?></a>
  	</footer>
  </div>
  
<?php endforeach; ?>


  <div id="newcomment" class="container">
  	<form method="post" action="index.php?action=comment">
  		<p>Ajouter un commentaire</p>
  		<input type="hidden" name="id" value="<?= $chapter['id'] ?>" />
      <input type="hidden" name="uniqid" value="<?= uniqid('', true)?>">
  		<input type="text" name="author" id="login" placeholder="Votre pseudo" size="30" required>
  		<textarea name="comment" id="newcomment_text" required>Votre message</textarea>
  		<input type="submit" name="send" value="Envoyer" id="submit">  	
  	</form>
  </div>
