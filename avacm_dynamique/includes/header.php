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
