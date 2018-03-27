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
        <h1>Sondage étudiant</h1>
    </header>
    <main>
        <form action="sondage-front.php" method="post">
          <div id="" class="ask">
              <div class="answer">
                  <label for="réponse1">
                    votre âge
                      <input id="réponse1" type="number" name="âge" required>
                  </label>
                  <div id="genre">
                    <label for="homme">
                      <input id="homme" type="radio" name="sexe" required>
                      <span class="span"></span>homme
                    </label>
                    <label for="femme">
                      <input id="femme" type="radio" name="sexe" required>
                      <span class="span"></span>femme
                    </label>
                  </div>
                  <label for="etiquette">
                    Votre étiquette (pseudo)
                    <input id="etiquette" type="text" size="30" name="etiquette" required>
                  </label>
                  <label for="statut">
                    Votre statut
                    <select id="statut" name="statut">
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
