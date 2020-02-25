<?php $this->title = "JF-Admin"; ?>

    <div class="container">
      <div class="row">
        <nav class="col-lg-4 ">
            <div class="row">
              <div class="col-12 admin-button-block"> <p>Bonjour <?= $_SESSION['login'];?>!</p> </div>
              <div class="col-12 admin-button-block"><a href="<?="index.php?action=edit&amp;name=create"?>" class="btn btn-light admin-button">+Ajouter un chapitre</a></div>
              <div class="col-12 admin-button-block"><a class="btn btn-dark admin-button" href="<?="index.php?action=admin&amp;name=comments"?>" role="button">Commentaires signalés</a></div>
            </div>
        </nav>

         <div id="chapters" class="col-lg-8 col-12">
            <?php foreach ($chapters as $chapter):
            ?>   
                <article class="chapter">

                    <header class="row">
                        <div class="title col-8">
                            <a href="<?= "index.php?action=edit&amp;name=modify&amp;id=" . $chapter['id'] ?>">
                                <h2 class="chapter_title"><?= $chapter['title'] ?></h2>
                            </a>  
                        </div>
                        <div class="info col-4">
                            <time><?= $chapter['date'] ?></time>
                        </div>
                    </header>
                    
                    <footer>
                      <div id="edit-buttons">
                        <a href="<?= "index.php?action=edit&amp;name=modify&amp;id=" . $chapter['id'] ?>" id="modify" role="button" class="btn btn-warning">Modifier</a>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-confirmation" data-id = "<?=$chapter['id'] ?>">
                        Supprimer
                        </button>
                      </div>
                        
                        <div class="modal fade" id="delete-confirmation" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                
                                <div class="modal-body">
                                  <form method="post" action=" " class="confirmation-form">
                                    <h5>Etes-vous sûr de vouloir supprimer ce chapitre?</h5>
                                    <span id="test"></span> 
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

       </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('#delete-confirmation').on('show.bs.modal', function (event) {
      let button = $(event.relatedTarget) 
      let id = button.data('id')
      let modal = $(this)
      modal.find('.confirmation-form').attr("action", "index.php?action=delete&chapter_id=" + id)    
    })
    </script>