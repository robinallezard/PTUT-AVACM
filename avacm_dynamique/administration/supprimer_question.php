<?php
  $parameter=array($_GET['id']);
  require_once('./includes/autoloader.php');
  App::getDatabase();
  $formulaire=App::$database->query("SELECT formulaire.id_formulaire FROM formulaire NATURAL JOIN comporte NATURAL JOIN question WHERE comporte.id_question=?",$parameter)->fetch(PDO::FETCH_OBJ);
  $id_formulaire=$formulaire->id_formulaire;
  App::$database->query("DELETE FROM comporte WHERE id_question=?",$parameter);
  App::$database->query("DELETE FROM reponse WHERE id_question=?",$parameter);
  App::$database->query("DELETE FROM question WHERE id_question=?",$parameter);
  header("Location: ./modifier_sondage.php?id=$id_formulaire");
 ?>
