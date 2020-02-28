<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Exo|Montserrat&display=swap" rel="stylesheet">
    
    <title><?= $title ?></title>   <!-- Élément spécifique -->
  </head>
  <body>
    <div id="global" class="container">
      <header>
        <nav id="menu" class="row"> 
          <div class="col-lg-4 col-12">
            <h2>Jean Forteroche</h2>
          </div>   
          <div class="col-lg-8 col-12">
            <ul class="row">
              <li class="col"><a href="index.php?action=admin">Accueil-Admin</a></li>
              <li class="col"><a href="index.php" target="_blank">Aller sur le site</a></li>
              <li class="col"><a href="index.php?action=admin_login&amp;session=0">Déconnecter</a></li>
            </ul>
          </div>    
         </nav>
        
      </header>
      <div id="content-admin">
        <?= $content ?>   <!-- Élément spécifique -->
      </div>

    </div> <!-- #global -->
  </body>
</html>


