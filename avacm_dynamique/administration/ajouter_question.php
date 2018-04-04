<?php
  $parameter=array($_GET['id']);
  require_once('./includes/autoloader.php');
  App::getDatabase();
  $formulaire=App::$database->query("SELECT formulaire.titre_formulaire FROM formulaire NATURAL JOIN comporte WHERE comporte.id_formulaire=?",$parameter)->fetch(PDO::FETCH_OBJ);
  if(isset($_POST['titre_question']) && isset($_POST['type_question'])){
    $titre=strip_tags($_POST['titre_question']);
    $type=strip_tags($_POST['type_question']);
    $parametres_question= null;
    if(($_POST['type_question']=='check') || ($_POST['type_question'] == 'radio' ) ){
      $count_choix=$_POST['nb_choix'];
      for($i=1;$i<=$count_choix;$i++){
        $choix=strip_tags($_POST['choix'.$i]);
        $parametres_question[$i]=$choix;
      }
      $parametres_question = serialize($parametres_question);
    }
    $parameters =array($titre,$type,$parametres_question);
    App::$database->query("INSERT INTO question (titre_question,type_question,parametres_question) values (?,?,?)",$parameters);
    $id_formulaire=$_GET['id'];
    $id_question = App::$database->lastInsertId();
    $parameters =array($id_question,$id_formulaire);
    App::$database->query("INSERT INTO comporte (id_question,id_formulaire) values (?,?)",$parameters);
    header("Location: ./modifier_sondage.php?id=$id_formulaire");
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
  <link rel="stylesheet" href="../assets/css/creation.css">
</head>

<body>
  <header>
    <!-- nom sondage -->
    <h1><?=$formulaire->titre_formulaire?></h1>
  </header>
  <main>
    <div class="ask">
      <div class="title">
        <input name="titre_question" type="text" form="form" placeholder="Nouvelle question" required/>
      </div>
      <div class="answer">
        <form id="form" class="" action="" method="post">
          <div id="ctrl">
            <select name="type_question" id ="select" required>
              <option disabled selected>le type de question</option>
              <option value="bool">Vrai/Faux</option>
              <option value="check">Choix multiples</option>
              <option value="phrase">Réponse courte</option>
              <option value="radio">Bouttons radios</option>
              <option value="scale">Échelle</option>
              <option value="text">Réponse Longue</option>
            </select>
            <button type="button" id="add_option">&#43;</button>
          </div>

       <div id="champ">
       </div>
       <input name="id_formulaire" type="hidden" value="<?=$id_formulaire;?>"/>
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
