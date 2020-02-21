<?php $this->title = "Mon Blog"; ?>
    
    <div id="banner" >
        <div id="banner-block">
            <div class="row ">
                <div class="col">
                    <h1> Jean Forteroche - Blog Personel</h1>
                </div>  
            </div>
            <div class="row">
                <div class="col"><p> Nouveau roman : Billet simple pour l'Alaska </p></div>
            </div>
       </div>        
    </div>

    <div id="homepage_content" >
        <div class="row">
            <aside id="summary" class="col-lg-4 col-12">
                <h3>Sommaire : </h3>
                <ol>
                <?php foreach ($summaryChapters as $summary):
                ?> 
                    <li> <a href="<?= "index.php?action=chapter&amp;id=" . $summary['id'] ?>"><?= $summary['title']?></a></li>
                <?php endforeach; ?>
                </ol>
            </aside>
            <div id="chapters" class="col-lg-8 ">
                <?php foreach ($chapters as $chapter):
                ?>   
                    <article class="chapter container-lg">
                        <header class="row">
                            <div class="title col-lg-8 col-12">
                                <a href="<?= "index.php?action=chapter&amp;id=" . $chapter['id'] ?>">
                                    <h2 class="chapter_title"><?= $chapter['title'] ?></h2>
                                </a>  
                            </div>
                            <div class="info col-lg-4 col-12">
                                <time><?= $chapter['date'] ?></time>
                            </div>
                        </header>
                        <p>
                            <?php 
                            $string = strip_tags($chapter['content']);
                            if (strlen($string)>150) {
                                $review = substr($string, 0, 150);
                                echo $review . "...";
                            } else{
                                echo $string;
                            }

                             ?>
                        </p>
                       
                        <footer>
                            <a href="<?= "index.php?action=chapter&amp;id=" . $chapter['id'] ?>">Lire la suite</a>
                        </footer>
                    </article>
                <?php endforeach; ?>

               <!-- Pagination--> 
            <?php if($numberOfPages>1) : ?>
            <div class="row">
                <div class="col">
                    <nav>
                      <ul class="pagination justify-content-center">
                        <li class="<?= isset($_GET['page'])&&intval($_GET['page'])>1 ? "page item" : "page-item disabled"?>">
                          <a class="page-link" href="<?php if(isset($_GET['page']) && intval($_GET['page'])>1)echo "index.php?page=" . ($_GET['page']-1);?>"  aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <?php if (isset($_GET['page']) && intval($_GET['page'])>4 && intval($_GET['page'])<$numberOfPages) : ?>
                            <li class="page-item"><a href="index.php" class="page-link">1</a></li>
                            <li class="page-item"><a href="<?= "index.php?page=" . ($_GET['page']-1) ?>" class="page-link"><?= $_GET['page']-1?></a></li>
                            <li class="page-item"><a href="<?= "index.php?page=" . $_GET['page'] ?>" class="page-link"><?= $_GET['page']?></a></li>
                            <li class="page-item"><a href="<?= "index.php?page=" . ($_GET['page']+1) ?>" class="page-link"><?= $_GET['page']+1?></a></li>
                            <?php if (isset($_GET['page'])&&intval($_GET['page'])<$numberOfPages) : ?>
                            <li class="page-item"><a href="<?= "index.php?page=" . $numberOfPages ?>" class="page-link">Derniere page</a></li>
                            <?php endif;?>
                        <?php else :?>
                            <?php for ($i=0; $i <$numberOfPages ; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="<?= "index.php?page=".($i+1)?>"><?= $i+1?></a></li>   
                           <?php } ?>                        
                        <?php endif;?>
                        <li class="<?= isset($_GET['page'])&&intval($_GET['page'])==$numberOfPages ? "page item disabled" : "page-item"?>">
                          <a class="page-link" href="<?= isset($_GET['page'])? "index.php?page=" . ($_GET['page']+1) : "index.php?page=2" ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>   
                </div>

            </div>
        <?php endif;?>
            </div>
        </div>
            
    </div>
    

