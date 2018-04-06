<?php

  //inclusion de l'autoloader qui va charger toutes les classes
  require_once('./includes/autoloader.php');

  //enregistrement de la base de données
  App::getDatabase();
?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <!-- Encodage -->
  <meta charset="UTF-8">

  <!-- Balise pour le "responsive" -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Titre de l'application -->
  <title>AVACM - Sondages</title>

  <!-- favicon -->
  <link rel="icon" href="./assets/img/favicon.png" type="img/png" />

  <!-- Google Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Cabin|PT+Sans" rel="stylesheet">

  <!--    feuilles de style-->
  <link rel="stylesheet" href="assets/css/materialize.min.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/selection.css">
</head>
<?php

  //récupération des formulaires disponibles : limité à 36 pour garder la qualité d'afficahge du slider
  $formulaires = App::$database->query("SELECT * FROM formulaire ORDER BY id_formulaire DESC LIMIT 36")->fetchAll();

  //nombre de formulaires disponibles
  $nb_formulaires = count($formulaires);

?>

<body>

  <header>
        <img src="assets/img/logo.svg" class="responsive-img" alt="logo AVACM">
        <h1>Assistance Visuelle Augmentée lors de Consultations Médicales</h1>
  </header>

  <main class="carousel">
  <?php
    // compteur pour le nombre de slide
    $nb_slide=0;
    // affiche les titres et les boutons pour répondre à un formulaire pour chaque formulaires
    for($i=0;$i<$nb_formulaires;$i++){
      // crée une slide si le compteur est à 0
      if ($nb_slide==0){ ?>
        <div class="slide">
      <?php } ?>
      <!--sondage + bouton participer -->
      <div class="sondage">
        <h2><?=$formulaires[$i]['titre_formulaire']?><br></h2>
        <a href="./profil.php?id=<?=$formulaires[$i]['id_formulaire']?>" class="waves-effect waves-light btn">Participer</a>
      </div>
      <?php
        $nb_slide++;
        // fermeture de la slide si le compteur est à 6, et réinitialisation du compteur de slide
        if($nb_slide==6){
        $nb_slide=0; ?>
      </div>
          <?php }
        } ?>
  </main>

  <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="assets/js/fontawesome-all.min.js"></script>
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- script qui génère le caroussel -->
  <script type="text/javascript" src="assets/js/slider.js"></script>
</body>
</html>
