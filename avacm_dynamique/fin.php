<?php
require_once('./includes/autoloader.php');
App::getDatabase();
// var_dump($_POST);
$id_formulaire=$_GET['id'];
$parameters= array($id_formulaire);
$formulaire = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch(PDO::FETCH_OBJ);
$questions = App::$database->query("SELECT * FROM question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE comporte.id_formulaire=?",$parameters)->fetchAll();
var_dump($questions[0]['id_question']);
$nb_questions=count($questions);
if($_POST){
  if(isset($_POST['id_utilisateur'])){
    $id_utilisateur=$_POST['id_utilisateur'];
    for($i=0;$i<$nb_questions;$i++){
        $id_question=$questions[$i]['id_question'];
        $valeur_reponse=$_POST[$id_question];
        $parameters = array($valeur_reponse,$id_utilisateur,$id_question);
          App::$database->query("INSERT INTO reponse (valeur_reponse, id_utilisateur,id_question) values (?,?,?)",$parameters);
    }
  }
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
    <!--    feuille de style-->
    <!-- <link rel="stylesheet" href="assets/css/materialize.min.css"> -->
    <link rel="stylesheet" href="assets/css/end.css">
</head>

<body>
    <header>
      <!-- nom sondage -->
      <h1><?=$formulaire->titre_formulaire?></h1>
    </header>
      <div id="message">
        <h2>Merci d'avoir participé à ce sondage</h2>
        <p>Les informations que vous venez de saisir sont strictement confidentielles et ne serviront qu'à améliorer notre application</p>
      </div>
      <a href="./">Revenir à l'acceuil</a>
  </body>
</html>
