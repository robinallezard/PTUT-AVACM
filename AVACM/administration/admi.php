<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVACM</title>
  <!-- font   -->
  <link href="https://fonts.googleapis.com/css?family=Cabin|PT+Sans" rel="stylesheet">
  <!--    feuille de style-->
  <link rel="stylesheet" href="../assets/css/admi.css">
</head>

<body>
  <header>
    <!-- nom sondage -->
    <form class="" action="" method="post">
      <input type="text" name="titre_formulaire" placeholder="Sondage étudiant">
      <button type="submit" name="button">Modifier le nom</button>
    </form>
  </header>
  <main>
    <a href="stat.html" class="block">
      <h2>Statistiques</h2>
      <i class="fas fa-eye"></i>
    </a>
    <a href="modif.php" class="block">
      <h2>Modifier les<br>questions</h2>
      <i class="fas fa-question"></i>
    </a>
    <a class="block">
      <h2>Exporter<br>les données</h2>
      <i class="fas fa-download"></i>
    </a>
    <a id="remove" class="block">
      <h2>Supprimer le<br>questionnaire</h2>
      <i class="fas fa-times"></i>
    </a>

  </main>

  <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/fontawesome-all.min.js"></script>
  <script type="text/javascript">
    $(document).ready(init);

    function init(){
      $('#remove').click(function(){
        alert("voulez vous vraiment supprimer ce questionnaire?");
      });
    };
  </script>
</body>
</html>
