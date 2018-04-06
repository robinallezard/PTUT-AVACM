<?php
require_once './includes/autoloader.php';
App::getDatabase();
$id_formulaire=$_GET['id'];
$parameters= array($id_formulaire);

$formulaire = App::$database->query("SELECT titre_formulaire FROM formulaire WHERE id_formulaire=?",$parameters)->fetch(PDO::FETCH_OBJ);

$questions = App::$database->query("SELECT titre_question FROM question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE comporte.id_formulaire=?",$parameters)->fetchAll();
$nb_questions=count($questions);

$premiere_ligne=array($formulaire->titre_formulaire);
for($i=0;$i<$nb_questions;$i++){
  array_push($premiere_ligne,$questions[$i]['titre_question']);
}
// var_dump($premiere_ligne);
$donnees=array($premiere_ligne);

$utilisateurs = App::$database->query("SELECT id_utilisateur, etiquette_utilisateur FROM utilisateur NATURAL JOIN reponse NATURAL JOIN question NATURAL JOIN comporte WHERE comporte.id_formulaire=? GROUP BY utilisateur.id_utilisateur",$parameters)->fetchAll(PDO::FETCH_OBJ);

foreach ($utilisateurs as $utilisateur) {
  $ligne_utilisateur=array($utilisateur->etiquette_utilisateur);
  $reponses=App::$database->query("SELECT valeur_reponse FROM utilisateur NATURAL JOIN reponse NATURAL JOIN question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE formulaire.id_formulaire=?",$parameters)->fetchAll(PDO::FETCH_OBJ);
  foreach ($reponses as $reponse) {
    array_push($ligne_utilisateur,$reponse->valeur_reponse);
  }
  array_push($donnees,$ligne_utilisateur);
}

header("Content-Type: text/plain");
header("Content-disposition: attachment; filename=$formulaire->titre_formulaire.csv");
$out = fopen('PHP://output', "w");
foreach($donnees as $ligne):
    fputcsv($out, $ligne);
endforeach;
fclose($out);

?>
