<?php
  $parameter=array($_GET['id']);
  require_once './includes/autoloader.php';
  App::getDatabase();
  $questions = App::$database->query("SELECT * FROM question NATURAL JOIN comporte NATURAL JOIN formulaire WHERE comporte.id_formulaire=?",$parameter)->fetchAll(PDO::FETCH_OBJ);
  // App::$database->query("DELETE FROM comporte WHERE id_formulaire=?",$parameter);
  App::$database->query("DELETE FROM formulaire WHERE id_formulaire=?",$parameter);
  foreach ($questions as $question) {
    $parameter=array($question->id_question);
     App::$database->query("DELETE FROM comporte WHERE id_formulaire=?",$parameter);
  }
  header("Location: ../administration/");
 ?>
