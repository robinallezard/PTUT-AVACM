<?php
  require_once('./includes/autoloader.php');
  App::getDatabase();
  if(isset($_POST['titre_formulaire'])){
    $titre=strip_tags($_POST['titre_formulaire']);
    if(isset($_POST['description_formulaire'])){
      $description=strip_tags($_POST['description_formulaire']);
    } else {
      $description=null;
    }
    $parameters =array($titre,$description);
    App::$database->query("INSERT INTO formulaire (titre_formulaire,description_formulaire) values (?,?)",$parameters);
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <header>
    <!-- nom sondage -->
    <?php if(isset($_POST['titre_formulaire'])){
        $id_formulaire = App::$database->lastInsertId();
        $titre_form = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=$id_formulaire")->fetch(); ?>
      <h1><?=$titre_form['titre_formulaire']?></h1>
    <?php } ?>
  </header>
  <?php if(!$_POST && !isset($_POST['titre_formulaire']) && !isset($_POST['description_formulaire'])){ ?>
  <form action="" method="post">
    <label for="titre_formulaire">Titre du formulaire :</label><input id="titre_formulaire" name="titre_formulaire" type="text">
    <label for="description_formulaire">Description du formulaire :</label><textarea id="description_formulaire" name="description_formulaire"></textarea>
    <input type="submit" value="Valider">
  </form>
  <?php } if(isset($_POST['titre_formulaire'])){ ?>
     <form action="" method="post">
       <div class="ask">
         <div class="title">
           <input name="titre_question" type="text" placeholder="Votre question..."/>
         </div>
         <div class="answer">
           <select name="type">
               <option value="bool">bool</option>
               <option value="check">check</option>
               <option value="phrase">phrase</option>
               <option value="radio">radio</option>
               <option value="scale">scale</option>
               <option value="text">text</option>
               <option disabled selected>le type de question</option>
             </select>
           <p class="error"></p>
           <strong class="btn-scroll"><i class="fas fa-plus"></i></strong>
         </div>
         <input name="id_formulaire" type="hidden" value="$id_formulaire"/>
         <input type="submit" value="Valider">
       </div>
     </form>
  <?php } ?>
  <!-- <form action="validation.html" method="post">
    <div class="ask">
      <div class="title">
        <input type="text" name="question1" placeholder="Votre question...">
      </div>
      <div class="answer">
        <select name="type">
            <option value="bool">bool</option>
            <option value="check">check</option>
            <option value="phrase">phrase</option>
            <option value="radio">radio</option>
            <option value="scale">scale</option>
            <option value="text">text</option>
            <option disabled selected>le type de question</option>
          </select>
        <p class="error"></p>
        <strong class="btn-scroll"><i class="fas fa-plus"></i></strong>
      </div>
    </div>
  </form> -->
</body>
</html>
