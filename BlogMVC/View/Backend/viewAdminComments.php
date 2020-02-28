<?php $this->title = "JF-Admin"; ?>
  <div class="container">
      <div class="row">
        <nav class="col-lg-4">
            
            <div id="admin-buttons" class="row justify-content-around">
              <div class="col-12 admin-button-block"> <a class="btn btn-dark admin-button" href="<?="index.php?action=admin&amp;name=comments"?>" role="button">Commentaires signalés (<?=$numberOfSignaledComments?>)</a> </div>
              <div class="col-12 admin-button-block"><a href="<?="index.php?action=admin&amp;name=comments&amp;type=all"?>" class="btn btn-light admin-button">Autres commentaires</a></div>
              <div class="col-12 admin-button-block"><a href="<?="index.php?action=admin"?>" class="btn btn-info admin-button"><-Retour à l'accueil</a></div>
            </div>
        </nav>
       
       

       <div id="comments" class="col-lg-8 col-12">
          <?php if ($numberOfSignaledComments==0 && !isset($_GET['type'])) :?> 
            <div class="alert alert-info" role="alert">
              <p>Pas de commentaires sigalés</p>
            </div>
          <?php endif; 
          foreach ($comments as $comment):
            if ($comment['signaled']==1 && !isset($_GET['type'])) : ?>
              <div class="comment-admin comment-signaled container">
                <header class="row">
                  <div class="title col-8">
                    <p class="comment_author"><strong><?= $comment['author'] ?></strong> pour <?=$comment['chapter_title']?></p>
                  </div>
                  <div class="info col-4">
                    <time><?= $comment['date'] ?></time>
                  </div>
                </header>
                <div class="comment-content col-12"><p><?= $comment['content']?></p></div>   
                <footer>
                  <a role="button" class="btn btn-success" href="<?="index.php?action=delete&amp;option=0&amp;id=" . $comment['id']?>">Enlever le signalement</a>
                  <a role="button" class="btn btn-danger" href="<?="index.php?action=delete&amp;option=1&amp;id=" . $comment['id']?>">Supprimer</a>
                </footer>
              </div>
           <?php elseif($comment['signaled']==0 && isset($_GET['type'])&& $_GET['type']=="all") : ?>
              <div class="comment-admin container">
                <header class="row">
                  <div class="title col-8">
                    <p class="comment_author"><strong><?= $comment['author'] ?></strong> pour <?=$comment['chapter_title']?></p>
                  </div>
                  <div class="info col-4">
                    <time><?= $comment['date'] ?></time>
                  </div>
                </header>
                <div class="comment-content col-12"><p><?= $comment['content']?></p></div>   
                <footer>
                  <a role="button" class="btn btn-danger" href="<?="index.php?action=delete&amp;type=all&amp;option=1&amp;id=" . $comment['id']?>">Supprimer</a>
                </footer>
              </div>
           <?php  endif;?> 
          <?php endforeach; ?>
       </div>
    </div>
  </div>