<?php

  $parameter=array($_GET['id']);
  require_once('./includes/autoloader.php');

  App::getDatabase();

  if(isset($_POST['titre_question']) && isset($_POST['type_question'])){
    $id=($_POST['id_question']);
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
    $parameters =array($titre,$type,$parametres_question,$id);
    App::$database->query("UPDATE question SET titre_question= ?, type_question=? , parametres_question=? WHERE id_question=?",$parameters);
  }

  $question = App::$database->query("SELECT * FROM question WHERE id_question=?",$parameter)->fetch(PDO::FETCH_OBJ);
  $formulaire=App::$database->query("SELECT id_formulaire, titre_formulaire FROM formulaire NATURAL JOIN comporte NATURAL JOIN question WHERE comporte.id_question=?",$parameter)->fetch(PDO::FETCH_OBJ);
  $id_formulaire=$formulaire->id_formulaire;
  $choix=unserialize($question->parametres_question);

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
        <input name="titre_question" type="text" form="form" value="<?=$question->titre_question?>" placeholder="<?=$question->titre_question?>"/>
      </div>
      <div class="answer">
        <form id="form" class="" action="" method="post">
          <div id="ctrl">
            <select name="type_question" id ="select" required>
              <option value="<?=$question->type_question?>" selected><?=$question->type_question?></option>
              <!-- <option value="bool">Vrai/Faux</option>
              <option value="check">Choix multiples</option>
              <option value="phrase">Réponse courte</option>
              <option value="radio">Bouttons radios</option>
              <option value="scale">Échelle</option>
              <option value="text">Réponse Longue</option> -->
            </select>
            <button type="button" id="add_option">&#43;</button>
          </div>

       <div id="champ">
         <?php if($choix){
           $nb_choix = count($choix);
            for($i=1;$i<=$nb_choix;$i++){ ?>
              <div class="option"><input type="text" size="30" name="choix<?=$i?>" value="<?=$choix[$i]?>"  placeholder="<?=$choix[$i]?>"/><button type="button" class="rem_option">&#215;</button></div>
            <?php } ?>
            <input id="nb_choix" name="nb_choix" type = "hidden" value ="<?=$nb_choix?>" />
          <?php } ?>
       </div>

       <input name="id_question" type="hidden" value="<?=$question->id_question?>"/>
          <button type="submit" class="btn-scroll"><i class="fas fa-plus"></i></button>
        </form>
      </div>
      <p class="error"></p>
    </div>
    <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/fontawesome-all.min.js"></script>
    <script src="../assets/js/creation.js"></script>
  </main>
</body>
