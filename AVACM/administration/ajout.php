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
  <link rel="stylesheet" href="../assets/css/creation.css">
</head>

<body>
  <header>
    <!-- nom sondage -->
    <h1>Sondage étudiant</h1>
  </header>
  <main>
    <!--           radio simple-->
    <div class="ask">
      <div class="title">
        <input type="text" name="question1" form="form" placeholder="votre nouvelle question...">
      </div>
      <div class="answer">
        <form id="form"class="" action="modif.php" method="post">

          <div id="ctrl">
            <select id="select" name="type">
              <option disabled>le type de question</option>
              <option value="bool">bool</option>
              <option value="check">check</option>
              <option value="phrase">phrase</option>
              <option value="radio">radio</option>
              <option value="scale">scale</option>
              <option value="text">text</option>
            </select>
            <button type="button" id="add_option">+</button>
          </div>

          <div id="champ">
          </div>
          <button type="submit" class="btn-scroll"><i class="fas fa-plus"></i></button>
        </form>
      </div>
      <p class="error"></p>
    </div>
  </main>

  <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.scrollTo.min.js"></script>
  <script src="../assets/js/fontawesome-all.min.js"></script>
  <script src="../assets/js/creation.js"></script>
</body>

</html>
