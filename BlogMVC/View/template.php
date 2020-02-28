<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="Public/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Exo|Montserrat&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>   <!-- Élément spécifique -->
  </head>
  <body>
    <div id="global" class="container-lg">
      <header >
        <nav id="menu" class="row"> 
            <div class="col-lg-4 col-12 ">
              <h2>Jean Forteroche</h2>
            </div>
            <div class="col-lg-8 col-12">
              <ul class="row">
                <li class="col"><a href="index.php" >Accueil</a></li>
                <li class="col"><a href="">A propos de l'auteur</a></li>
                <li class="col"><a href="">Decouvrir plus</a></li>
              </ul>
            </div>
          
         </nav>
      </header>
      <div id="contenu" >
        <?= $content ?>   <!-- Élément spécifique -->
      </div>
      <footer id="piedBlog">
        <p>Blog personnel de Jean Forteroche </p>
      </footer>
    </div> <!-- #global -->
  </body>
</html>