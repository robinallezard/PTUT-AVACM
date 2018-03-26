<?php
  require_once('./includes/autoloader.php');
  App::getDatabase();
  $id_formulaire;
  $titre_formulaire;
  $count_question = 1;

  // Si le formulaire de création du formulaire à été rempli
  if(isset($_POST['titre_formulaire'])){
    $titre_formulaire=strip_tags($_POST['titre_formulaire']);
    if(isset($_POST['description_formulaire'])){
      $description=strip_tags($_POST['description_formulaire']);
    } else {
      $description=null;
    }
    $parameters = array($titre_formulaire,$description);
    App::$database->query("INSERT INTO formulaire (titre_formulaire,description_formulaire) values (?,?)",$parameters);
    $id_formulaire = App::$database->lastInsertId();
  }

  if(isset($_POST['titre_question']) && isset($_POST['type_question'])){
    $titre=strip_tags($_POST['titre_question']);
    $type=strip_tags($_POST['type_question']);
    $parameters =array($titre,$type);
    App::$database->query("INSERT INTO question (titre_question,type_question) values (?,?)",$parameters);
    $id_formulaire=$_POST['id_formulaire'];
    $id_question = App::$database->lastInsertId();
    $parameters =array($id_question,$id_formulaire);
    App::$database->query("INSERT INTO comporte (id_question,id_formulaire) values (?,?)",$parameters);
    $count_question ++ ;
  }
?>

<!-- <?php if(isset($_POST['titre_formulaire'])){
    $titre_form = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=$id_formulaire")->fetch(); ?>
<?php } ?> -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Cabin|PT+Sans" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/creation.css">

  <title>AVACM</title>

</head>

<body>
  <header>
      <?php if (!$_POST){ ?>
        <h1>Nouveau formulaire</h1>
    <?php } ?>
    <!-- nom sondage -->
    <?php if (isset($titre_formulaire)){ ?>
      <h1><?=$titre_formulaire;?></h1>
    <?php } ?>
  </header>
  <main>
  <?php if(!$_POST && !isset($_POST['titre_formulaire']) && !isset($_POST['description_formulaire'])){ ?>


    <div class="ask">
      <div class="title">
          <form action="" method="post">
            <input name="titre_formulaire" type="text" placeholder="Votre formulaire..." >
          </form>
      </div>
    </div>

<?php } if($_POST){?>
       <div class="ask">
         <div class="title">
           <input name="titre_question" type="text" form="form" placeholder="Question n°<?= $count_question ?>" required/>
         </div>
         <div class="answer">
           <form id="form"class="" action="" method="post">
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
               <button type="button" id="add_option">&#215;</button>
             </div>
          <div id="champ">
          </div>

           <input name="id_formulaire" type="hidden" value="<?=$id_formulaire;?>"/>
          <button type="submit" class="btn-scroll"><i class="fas fa-plus"></i></button>
          </div>
          </form>
          <p class="error"></p>
          <a href="./"><button class="exit">Terminer</button></a>
       </div>

  <?php } ?>
</main>
  <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.scrollTo.min.js"></script>
  <script src="../assets/js/fontawesome-all.min.js"></script>
  <script src="../assets/js/creation.js"></script>
</body>
</html>
