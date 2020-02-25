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