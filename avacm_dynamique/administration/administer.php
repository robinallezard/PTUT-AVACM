<?php
require_once './includes/autoloader.php';
App::getDatabase();
$id_formulaire=$_GET['id'];
$parameters= array($id_formulaire);
$form = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch();
if(isset($_POST['titre_formulaire']) && !empty($_POST['titre_formulaire'])){
  $titre_formulaire=strip_tags($_POST['titre_formulaire']);
  $parameters = array($titre_formulaire,$id_formulaire);
  App::$database->query("UPDATE formulaire SET titre_formulaire=? WHERE id_formulaire=?",$parameters);
  header("Location: ./administer.php?id=$id_formulaire");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVACM</title>
  <!-- font   -->
  <link href="https://fonts.googleapis.com/css?family=Cabin|PT+Sans" rel="stylesheet">
  <!-- feuille de style -->
  <link rel="stylesheet" href="../assets/css/admi.css">
</head>

<body>
  <header>
    <!-- nom sondage modifiable -->
    <form class="" action="" method="post">
      <input type="text" name="titre_formulaire" placeholder="<?=$form['titre_formulaire']?>">
      <button type="submit" name="button">Modifier le nom</button>
    </form>
  </header>
  <main>
    <a href="stat.html" class="block">
      <h2>Statistiques</h2>
      <i class="fas fa-eye"></i>
    </a>
    <a href="modifier_sondage.php?id=<?=$id_formulaire?>" class="block">
      <h2>Modifier les<br>questions</h2>
      <i class="fas fa-question"></i>
    </a>
    <a  href="exporter.php?id=<?=$id_formulaire?>" class="block">
      <h2>Exporter<br>les données</h2>
      <i class="fas fa-download"></i>
    </a>
    <a href="./supprimer_sondage.php?id=<?=$id_formulaire?>" id="remove" class="block">
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
        alert("voulez vous vraiment supprimer sondage ?");
      });
    };
  </script>
</body>
</html>
