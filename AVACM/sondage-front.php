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
    <link rel="stylesheet" href="assets/css/sondage-front.css">
</head>

<body>
    <header>
        <!-- nom sondage -->
        <h1>Sondage étudiant</h1>
    </header>
    <nav>
      <!-- nombre de question -->
      <a name="#question1"></a>
      <a name="#question2"></a>
      <a name="#question3"></a>
      <a name="#question4"></a>
      <a name="#question5"></a>
      <a name="#question6"></a>
    </nav>
    <main>
        <form action="end.html" method="post">
          <div id="question1" class="ask">
              <h2>Comment vous êtes vous senti lors de l'examen?</h2>
              <div class="answer check">
                  <label for="réponse1">
                      <input id="réponse1" type="radio" name="test">
                      <span class="span"></span>ça va bien merci
                  </label>
                  <label for="réponse2">
                      <input id="réponse2" type="radio" name="test">
                      <span class="span"></span>j'ai un peu mal à la tête
                  </label>
                  <label for="réponse3">
                      <input id="réponse3" type="radio" name="test">
                      <span class="span"></span>j'ai bien envie d'un kebab
                  </label>
                  <p class="error"></p>
                  <strong class="btn-scroll">Question suivante</strong>
              </div>
          </div>

            <!--           checkbox -->
            <div id="question2" class="ask">
                <h2>Comment vous êtes vous senti lors de l'examen?</h2>
                <div class="answer check">
                    <label for="réponse4">
                        <input id="réponse4" type="checkbox" name="test">
                        <span class="span"></span>ça va bien merci
                    </label>
                    <label for="réponse5">
                        <input id="réponse5" type="checkbox" name="test">
                        <span class="span"></span>j'ai un peu mal à la tête
                    </label>
                    <label for="réponse6">
                        <input id="réponse6" type="checkbox" name="test">
                        <span class="span"></span>j'ai bien envie d'un kebab
                    </label>
                    <p class="error"></p>
                    <strong class="btn-scroll">Question suivante</strong>
                </div>
            </div>
            <!-- vrai ou faux -->
            <div  id="question3" class="ask">
                <h2>C'était cool?</h2>
                <div class="answer bool">
                    <label for="réponse7">
                        <input id="réponse7" type="radio" name="test">
                        <span class="false"></span>
                    </label>
                    <label for="réponse8">
                        <input id="réponse8" type="radio" name="test">
                        <span class="true"></span>
                    </label>
                    <p class="error"></p>
                    <strong class="btn-scroll">Question suivante</strong>
                </div>
            </div>
            <!--         echelle de valeurs   -->
            <div  id="question4" class="ask">
                <h2>sur une echelle de 1 à 10, combien avez vous eu mal?</h2>
                <div class="answer scale">
                    <label for="réponse9">
                        <input id="réponse9" type="radio" name="test">
                        <span></span>1
                    </label>
                    <label for="réponse10">
                        <input id="réponse10" type="radio" name="test">
                        <span></span>2
                    </label>
                    <label for="réponse11">
                        <input id="réponse11" type="radio" name="test">
                        <span></span>3
                    </label>
                    <label for="réponse12">
                        <input id="réponse12" type="radio" name="test">
                        <span></span>4
                    </label>
                    <label for="réponse13">
                        <input id="réponse13" type="radio" name="test">
                        <span></span>5
                    </label>
                    <label for="réponse14">
                        <input id="réponse14" type="radio" name="test">
                        <span></span>6
                    </label>
                    <label for="réponse15">
                        <input id="réponse15" type="radio" name="test">
                        <span></span>7
                    </label>
                    <label for="réponse16">
                        <input id="réponse16" type="radio" name="test">
                        <span></span>8
                    </label>
                    <label for="réponse17">
                        <input id="réponse17" type="radio" name="test">
                        <span></span>9
                    </label>
                    <label for="réponse18">
                        <input id="réponse18" type="radio" name="test">
                        <span></span>10
                    </label>
                    <p class="error"></p>
                    <strong class="btn-scroll">Question suivante</strong>
                </div>
            </div>

            <!--           réponse courte-->
            <div id="question5" class="ask">
                <h2>un mot pour décrire cette expérience</h2>
                <div class="answer phrase">
                    <input id="réponse19" type="text" placeholder="votre texte ici..." name="test">
                    <p class="error"></p>
                    <strong class="btn-scroll">Question suivante</strong>
                </div>
            </div>

            <div  id="question6" class="ask">
                <h2>que conseillerez vous pour ameliorer cette app?</h2>
                <div class="answer text">
                    <textarea rows="2" placeholder="votre texte ici..."></textarea>
                    <p class="error"></p>
                    <!-- <strong class="btn-scroll"><i class="fas fa-chevron-right"></i></strong> -->
                </div>
                    <button type="submit">Fin</button>
            </div>

        </form>
    </main>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/fontawesome-all.min.js"></script>
    <script type="text/javascript" src="assets/js/sondage-front.js"></script>
</body>
</html>
