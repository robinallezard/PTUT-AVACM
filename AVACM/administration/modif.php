<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVACM</title>
  <!-- font   -->
  <link href="https://fonts.googleapis.com/css?family=Cabin|PT+Sans" rel="stylesheet">
  <!--    feuille de style-->
  <link rel="stylesheet" href="../assets/css/modif.css">
</head>

<body>
  <header>
    <!-- nom sondage -->
    <h1>Sondage étudiant</h1>
  </header>
  <main>
    <div class="ask">
      <div class="question">
        <h3>La question 1</h3>
        <div class="ctrl">
          <button class="remove" type="button">&#215;</button>
          <button class="change" type="button"><i class="fas fa-exchange-alt"></i></button>
        </div>
      </div>
      <div class="question">
        <h3>La question 2</h3>
        <div class="ctrl">
          <button class="remove" type="button">&#215;</button>
          <button class="change" type="button"><i class="fas fa-exchange-alt"></i></button>
        </div>
      </div>
      <div class="question">
        <h3>La question 3</h3>
        <div class="ctrl">
          <button class="remove" type="button">&#215;</button>
          <button class="change" type="button"><i class="fas fa-exchange-alt"></i></button>
        </div>
      </div>
      <div class="question">
        <h3>La question 4</h3>
        <div class="ctrl">
          <button class="remove" type="button">&#215;</button>
          <button class="change" type="button"><i class="fas fa-exchange-alt"></i></button>
        </div>
      </div>
      <div class="question">
        <h3>La question 5</h3>
        <div class="ctrl">
          <button class="remove" type="button">&#215;</button>
          <button class="change" type="button"><i class="fas fa-exchange-alt"></i></button>
        </div>
      </div>
      <a href="ajout.php" id="ad">Ajouter une question</a>
    </div>
  </main>

  <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/fontawesome-all.min.js"></script>
  <script type="text/javascript">
      $(document).ready(init);

      function init(){
        $('.remove').click(function(){
          alert('Voulez-vous vraiment supprimer ce formulaire définitivement?');
        });
      }
  </script>
</body>
</html>
