<?php
require_once './includes/autoloader.php';
App::getDatabase();
$id_formulaire=$_GET['id'];
$parameters= array($id_formulaire);
$formulaire = App::$database->query("SELECT * FROM formulaire WHERE id_formulaire=?",$parameters)->fetch(PDO::FETCH_OBJ);
$questions = App::$database->query("SELECT * FROM question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE comporte.id_formulaire=?",$parameters)->fetchAll();
$nb_questions=count($questions);
header("Content-Type: text/plain");
header("Content-disposition: attachment; filename=$formulaire->titre_formulaire.csv");
$liste = array ();
for($i=0;$i<$nb_questions;$i++){
  array_push($liste,$questions[$i]);
}
$out = fopen('PHP://output', "w");
foreach($liste as $fields):
    fputcsv($out, $fields);
endforeach;
fclose($out);
?>
