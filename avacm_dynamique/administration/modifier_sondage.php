<?php
  require_once './includes/autoloader.php';
  App::getDatabase();
  $id_formulaire=$_GET['id'];
  $parameters= array($id_formulaire);
  $formulaire = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch(PDO::FETCH_OBJ);
  $questions = App::$database->query("SELECT * FROM question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE comporte.id_formulaire=?",$parameters)->fetchAll(PDO::FETCH_OBJ);
  $nb_questions=count($questions);
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
  <link rel="stylesheet" href="../assets/css/modif.css">
</head>

<body>
  <header>
    <!-- nom sondage -->
    <h1><?=$formulaire->titre_formulaire?></h1>
  </header>
  <main>

    <div class="ask">

      <?php foreach ($questions as $question) { ?>
        <div class="question">
          <h3><?=$question->titre_question?></h3>
          <div class="ctrl">
            <a href="supprimer_question.php?id=<?=$question->id_question?>"><button class="remove" type="button">&#215;</button></a>
            <a href="modifier_question.php?id=<?=$question->id_question?>"><button class="change" type="button"><i class="fas fa-exchange-alt"></i></button></a>
          </div>
        </div>
      <?php } ?>

      <a href="ajouter_question.php?id=<?=$id_formulaire?>" id="ad">Ajouter une nouvelle question</a>

      <a href="questions_existantes.php?id=<?=$id_formulaire?>" id="ad">Ajouter une question existante</a>

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
