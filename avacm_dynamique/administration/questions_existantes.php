<?php require_once('./includes/autoloader.php');
  App::getDatabase();
  $questions = App::$database->query("SELECT * FROM question NATURAL JOIN comporte")->fetchAll(PDO::FETCH_OBJ);
  if ($_GET){
    $id_formulaire=$_GET['id'];
  }
  if($_POST && isset($_GET['id_formulaire'])){
    $id_formulaire=$_POST['id_formulaire'];
    $id_question=$_POST['id_question'];
    $parameters($id_formulaire,$id_question);
    App::$database->query("INSERT INTO comporte (id_question,id_formulaire) values (?,?)",$parameters);
  }
?>
 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- feuilles de style -->
     <link rel="stylesheet" href="assets/css/materialize.min.css">
     <link rel="stylesheet" href="assets/css/connexion.css">
     <title>Liste des questions existantes</title>
 </head>
 <body>
  <h1>Liste des questions existantes</h1>
  <?php foreach ($questions as $question){ ?>
    <form action="" method="post">
    <h2><?=$question->titre_question?></h2>
    <?php if($question->type_question == 'radio'){ ?>
      <h3>Boutons radio</h3>
    <?php } else if ($question->type_question == 'check'){ ?>
      <h3>Choix multiples</h3>
    <?php } else if ($question->type_question == 'bool'){ ?>
      <h3>Vrai/Faux</h3>
    <?php } else if ($question->type_question == 'phrase'){ ?>
      <h3>Réponse Courte</h3>
    <?php } else if ($question->type_question == 'text'){ ?>
      <h3>Réponse Longue</h3>
    <?php } else if ($question->type_question == 'scale'){ ?>
      <h3>Échelle de valeur</h3>
    <?php } ?>
    <input type="hidden"  value="<?=$question->id_question?>"
    <input type="hidden" value=<?=$id_formulaire?> />
    <button type='submit'>Ajouter au sondage</button>
  <?php } ?>
 </body>
