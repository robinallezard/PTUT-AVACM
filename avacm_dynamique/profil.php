<?php
require_once('./includes/autoloader.php');
App::getDatabase();
// récupération du formulaire
$id_formulaire=$_GET['id'];
$parameters= array($id_formulaire);
$formulaire = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch();
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
    <link rel="stylesheet" href="assets/css/profil.css">
</head>

<body>
    <header>
        <!-- Nom du formualire -->
        <h1><?=$formulaire['titre_formulaire']?></h1>
    </header>
    <main>
      <!-- formulaire/pré-sondage pour définir l'utilisateur qui remplit le sondage -->
      <!-- l'id de l'utilisateur est a nouveau passé en paramètre d'URL à la fin de ce pré-sondage-->
        <form action="repondre.php?id=<?=$id_formulaire?>" method="post">
          <div id="" class="ask">
              <div class="answer">
                <!-- age de l'utilisateur -->
                  <label for="age">
                    votre âge
                      <input id="age" type="number" name="age_utilisateur" required>
                  </label>
                  <!-- sexe de l'utilisateur -->
                  <div id="sexe">
                    <label for="homme">
                      <input id="homme" type="radio" name="sexe_utilisateur" value="homme" required>
                      <span class="span"></span>homme
                    </label>
                    <label for="femme">
                      <input id="femme" type="radio" name="sexe_utilisateur" value="femme" required>
                      <span class="span"></span>femme
                    </label>
                  </div>
                  <!-- etiquette (alias) de l'utilisateur -->
                  <label for="etiquette">
                    Votre étiquette (pseudo)
                    <input id="etiquette" type="text" size="30" name="etiquette_utilisateur" required>
                  </label>
                  <!-- statut de l'utilisateur -->
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
