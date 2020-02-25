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
                            <div class="row">
                                <div class="col-lg-8 col-6">
                                    <a href="<?= "index.php?action=chapter&amp;id=" . $chapter['id'] ?>">Lire la suite</a>
                                </div>
                                <div class="col-lg-4 col-6">
                                    Commentaires(<?=$chapter['numOfComments']?>)
                                </div>
                            </div>
                            
                        </footer>
                    </article>
                <?php endforeach; 
                    require_once 'View/ViewPagination.php';
                ?>

               <!-- Pagination--> 
                
            </div>
        </div>
            
    </div>
    

