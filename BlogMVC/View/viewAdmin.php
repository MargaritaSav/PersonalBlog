<?php $this->title = "JF-Admin"; ?>

    <div class="container">
      <div class="row">
        <nav class="col-lg-4 col-12">
            <p>Bonjour <?= $_SESSION['login'];?>!</p>
            <div id="admin-buttons">
              <a href="<?="index.php?action=edit&amp;name=create"?>" class="btn btn-light ">+Ajouter un chapitre</a>
              <a class="btn btn-dark" href="<?="index.php?action=admin&amp;name=comments"?>" role="button">Commentaires signalés</a>
            </div>
        </nav>

      <?php if (isset($_GET["name"])&&$_GET["name"]=="comments") :
       ?>

       <div id="comments" class="col-lg-8 col-12">
         <?php foreach ($comments as $comment):
            ?>
           <div class="comment-signaled container">
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
            
          <?php endforeach; ?>
       </div>

      <?php else : ?>
         <div id="chapters" class="col-lg-8 col-12">
            <?php foreach ($chapters as $chapter):
            ?>   
                <article class="chapter container">

                    <header class="row">
                        <div class="title col-8">
                            <a href="<?= "index.php?action=chapter&amp;id=" . $chapter['id'] ?>">
                                <h2 class="chapter_title"><?= $chapter['title'] ?></h2>
                            </a>  
                        </div>
                        <div class="info col-4">
                            <time><?= $chapter['date'] ?></time>
                        </div>
                    </header>
                    
                    <footer>
                      <div id="edit-buttons">
                        <a href="<?= "index.php?action=edit&amp;name=modify&amp;id=" . $chapter['id'] ?>" id="modify" role="button" class="btn btn-outline-warning">Modifier</a>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-confirmation">
                        Supprimer
                        </button>
                      </div>
                        
                        <div class="modal fade" id="delete-confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                      
                                <div class="modal-body">
                                  <form method="post" action="<?= "index.php?action=delete&amp;chapter_id=" . $chapter['id'] ?>">
                                    <h5>Etes-vous sûr de vouloir supprimer ce chapitre?</h5> 
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Oui</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                   
                                    </div>
                                  </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                    </footer>
                </article>
            <?php endforeach; ?>
        </div>

      <?php endif; ?>
       </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>