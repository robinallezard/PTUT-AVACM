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


  <!-- feuilles de styles-->

  <!-- framework materialize.css -->
  <link rel="stylesheet" href="assets/css/materialize.min.css">

  <!-- feuille de style de l'acceuil -->
  <link rel="stylesheet" href="assets/css/homepage.css">

</head>

<body>
  <!-- bandeau d'entête -->
  <header>
    <!-- logo de l'application en .svg -->
    <img src="assets/img/logo.svg" class="responsive-img" alt="logo AVACM">
    <!-- titre de l'application -->
    <h1>Assistance Visuelle Augmentée lors de Consultations Médicales</h1>
  </header>
  <!-- contenu de la page -->
  <main>
    <!-- bouton vers le front-office -->
    <a href="./selection.php" id="sondage" class="valign-wrapper block">
      <h2>sondages</h2><i class="fas fa-comment fa-5x"></i></a>
    <!-- bouton vers la connexion au back-office -->
    <a href="./connexion.php" id="mentions" class="valign-wrapper block">
      <h2>administration</h2><i class="fas fa-chart-bar fa-5x"></i></a>
  </main>

  <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
  <script src="assets/js/fontawesome-all.min.js"></script>
</body>

</html>
