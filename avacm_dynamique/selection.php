<?php
  require_once './includes/autoloader.php';
  App::getDatabase();
  //récupération des formulaires disponibles
  $forms = App::$database->query("SELECT * FROM formulaire")->fetchAll();
  //récupération des formulaires disponibles
  $count = count($forms);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVACM</title>
  <!-- font   -->
  <link href="https://fonts.googleapis.com/css?family=Cabin|PT+Sans" rel="stylesheet">
  <!--    feuille de style-->
  <link rel="stylesheet" href="assets/css/materialize.min.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/selection.css">
</head>

<body>

  <header>
        <img src="assets/img/logo.svg" class="responsive-img" alt="logo AVACM">
        <h1>Assistance Visuelle Augmentée lors de Consultations Médicales</h1>
    </header>

  <main class="carousel">
  <?php
    // compteur pour le nombre de slide
    $count_slide=0;
    // affiche les titres et les boutons pour répondre à un formulaire
    for($i=0;$i<$count;$i++){
      // crée une slide si le compteur est à 0
      if ($count_slide==0){ ?>
        <div class="slide">
      <?php } ?>
      <!--sondage + bouton répondre -->
      <div class="sondage">
        <h2><?=$forms[$i]['titre_formulaire']?><br></h2>
        <a href="./profil.php?id=<?=$forms[$i]['id_formulaire']?>" class="waves-effect waves-light btn">Participer</a>
      </div>
      <?php
        $count_slide++;
        // fermeture de la slide si le compteur est à 6, et réinitialisation
        if($count_slide==6){
        $count_slide=0; ?>
      </div>
          <?php }
        } ?>
  </main>

  <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="assets/js/fontawesome-all.min.js"></script>
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
