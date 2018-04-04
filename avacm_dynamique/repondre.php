<?php
  require_once('./includes/autoloader.php');
  App::getDatabase();
?>
<?php
if($_POST){
  if(isset($_POST['age_utilisateur']) && isset($_POST['sexe_utilisateur'])  && isset($_POST['etiquette_utilisateur'])  && isset($_POST['statut_utilisateur'])){
    $age=strip_tags(($_POST['age_utilisateur']));
    $sexe=strip_tags(($_POST['sexe_utilisateur']));
    $etiquette=strip_tags(($_POST['etiquette_utilisateur']));
    $statut=strip_tags(($_POST['statut_utilisateur']));
    $parameters = array($age,$sexe,$etiquette,$statut);
    App::$database->query("INSERT INTO utilisateur (age_utilisateur,sexe_utilisateur,etiquette_utilisateur,statut_utilisateur) values (?,?,?,?)",$parameters);
    $id_utilisateur=App::$database->lastInsertId();
  }
}
  $id_formulaire=$_GET['id'];
  $parameters= array($id_formulaire);
  $formulaire = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch(PDO::FETCH_OBJ);
  $questions = App::$database->query("SELECT * FROM question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE comporte.id_formulaire=?",$parameters)->fetchAll();
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
    <!-- <link rel="stylesheet" href="assets/css/materialize.min.css"> -->
    <link rel="stylesheet" href="assets/css/sondage-front.css">
</head>

<body>
    <header>
        <!-- nom sondage -->
        <h1><?=$formulaire->titre_formulaire?></h1>
    </header>
    <nav>
      <!-- nombre de question -->
    <?php for ($i=0;$i<$nb_questions;$i++){?>
      <a name="#question<?=$i?>"></a>
    <?php } ?>
    </nav>
    <main>
        <form action="fin.php?id=<?=$id_formulaire?>" method="post">
          <!-- de la 1ère à la Nème question -->
          <?php
            for ($i=0;$i<$nb_questions;$i++) {

            // je mets sous forme de tableau les paramètres sérialisés d'une question
            $parametres_question= unserialize($questions[$i]['parametres_question']);

            //je compte le nombre de réponses à cette question si les paramètres existent
            $count_reponses = count($parametres_question);?>

            <!-- je génère le block qui contient la question : titre + champs -->
            <div id="question<?=$i?>" class="ask">

                <!-- titre de la question -->
                <h2><?=$questions[$i]['titre_question']?></h2>

                <!-- block qui contient les champs. Il prend comme classe le type de question -->
                <div class="answer <?=$questions[$i]['type_question']?>">
                  <!-- les champs sont générés celon le type de question -->

                  <!-- boutons radios -->
                  <?php if($questions[$i]['type_question'] == 'radio') {
                    $id_question=$questions[$i]['id_question'];
                    for($x=1;$x<=$count_reponses;$x++){?>
                      <label for="question<?=$id_question?>_choix<?=$x?>">
                        <input id="question<?=$id_question?>_choix<?=$x?>" type="radio" value="<?=$parametres_question[$x]?>" name="<?=$questions[$i]['id_question']?>">
                        <span class="span"></span> <?=$parametres_question[$x]?>
                    </label>
                  <?php }  ?>

                  <!-- choix multiples -->
                <?php } else if($questions[$i]['type_question'] == 'check') {
                    $id_question=$questions[$i]['id_question'];
                    for($x=1;$x<=$count_reponses;$x++){?>
                      <label for="question<?=$id_question?>_choix<?=$x?>">
                        <input id="question<?=$id_question?>_choix<?=$x?>" type="checkbox" value="<?=$parametres_question[$x]?>" name="<?=$questions[$i]['id_question']?>">
                        <span class="span"></span><?=$parametres_question[$x]?>
                    </label>
                  <?php } ?>

                  <!-- vrai/faux -->
                <?php } else if($questions[$i]['type_question'] == 'bool') { ?>
                    <label for="false<?=$questions[$i]['id_question']?>">
                        <input id="false<?=$questions[$i]['id_question']?>" type="radio" value="non" name="<?=$questions[$i]['id_question']?>">
                        <span class="false"></span>
                    </label>
                    <label for="true<?=$questions[$i]['id_question']?>">
                        <input id="true<?=$questions[$i]['id_question']?>" type="radio" value="oui" name="<?=$questions[$i]['id_question']?>">
                        <span class="true"></span>
                    </label>

                  <!-- réponse courte -->
                <?php } else if($questions[$i]['type_question'] == 'phrase') { ?>
                    <input type="text" placeholder="votre texte ici..." name="<?=$questions[$i]['id_question']?>"/>

                  <!-- réponse longue -->
                <?php } else if($questions[$i]['type_question'] == 'text') { ?>
                    <textarea rows="2" placeholder="votre texte ici..." name="<?=$questions[$i]['id_question']?>"></textarea>

                  <!-- échelle de valeur -->
                <?php } else if($questions[$i]['type_question'] == 'scale') {
                      $id_question=$questions[$i]['id_question'];
                      for($q=1;$q<=10;$q++){ ?>
                        <label for="question<?=$id_question?>_choix<?=$q?>">
                            <input id="question<?=$id_question?>_choix<?=$q?>" value="<?=$q?>" type="radio" name="<?=$questions[$i]['id_question']?>">
                            <span></span><?=$q?>
                        </label>
                  <?php } } ?>

                  <!-- le message d'erreur apparaît dans ce block -->
                  <p class="error"></p>

                  <!-- bouton pour passer à la question suivante -->
                  <strong class="btn-scroll">Question suivante</strong>

                </div>
            </div>
          <!-- fin d'une question -->
          <?php  } ?>
          <input name="id_utilisateur" type="hidden" value="<?=$id_utilisateur?>">
          <!-- <input name="nb_questions" type="hidden" value="<?=$nb_questions?>"> -->
            <button type="submit">Fin</button>
        </form>
    </main>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/fontawesome-all.min.js"></script>
    <script type="text/javascript" src="assets/js/sondage-front.js"></script>
</body>
</html>
