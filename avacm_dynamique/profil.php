<?php
require_once('./includes/autoloader.php');
App::getDatabase();
$id_formulaire=$_GET['id'];
$parameters= array($id_formulaire);
$titre_formulaire = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch();
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
    <!-- <link rel="stylesheet" href="assets/css/materialize.min.css"> -->
    <link rel="stylesheet" href="assets/css/profil.css">
</head>

<body>
    <header>
        <!-- nom sondage -->
        <h1><?=$titre_formulaire['titre_formulaire']?></h1>
    </header>
    <main>
        <form action="repondre.php?id=<?=$id_formulaire?>" method="post">
          <div id="" class="ask">
              <div class="answer">
                  <label for="age">
                    votre âge
                      <input id="age" type="number" name="age_utilisateur" required>
                  </label>
                  <div id="genre">
                    <label for="homme">
                      <input id="homme" type="radio" name="sexe_utilisateur" value="homme" required>
                      <span class="span"></span>homme
                    </label>
                    <label for="femme">
                      <input id="femme" type="radio" name="sexe_utilisateur" value="femme" required>
                      <span class="span"></span>femme
                    </label>
                  </div>
                  <label for="etiquette">
                    Votre étiquette (pseudo)
                    <input id="etiquette" type="text" size="30" name="etiquette_utilisateur" required>
                  </label>
                  <label for="statut">
                    Votre statut
                    <select id="statut" name="statut_utilisateur">
                          <option value="praticien">praticien</option>
                          <option value="etudiant">étudiant</option>
                          <option value="patient">patient</option>
                    </select>
                  </label>
                  <p class="error"></p>
                  <button type="submit">Aller au sondage</button>
              </div>
          </div>
        </form>
    </main>
    <script src="assets/js/fontawesome-all.min.js"></script>
</body>
</html>
