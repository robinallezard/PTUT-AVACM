<?php
  require_once './includes/autoloader.php';
  App::getDatabase();
  $forms = App::$database->query("SELECT * FROM formulaire")->fetchAll();
  $count = count($forms);
  $decount = count($forms);
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
  <link rel="stylesheet" href="../assets/css/materialize.min.css">
  <link rel="stylesheet" href="../assets/css/slick.css">
  <link rel="stylesheet" href="../assets/css/selection.css">
</head>
<body>

  <header id="head-back">
        <img src="../assets/img/logo.svg" class="responsive-img" alt="logo AVACM">
        <h1>Assistance Visuelle Augmentée lors de Consultations Médicales</h1>
    </header>
  <main class="carousel">
    <?php
    if(!$count){ ?>
        <div class="slide">
      <div class="sondage">
        <h2>Nouveau sondage</h2>
        <a href="./creation.php"><i class="fas fa-plus-circle"></i></a>
      </div>
    </div>
    <?php }
      $count_slide=0;
      for($i=0;$i<$count;$i++){
        $decount--;
        if ($count_slide==0){ ?>
          <div class="slide">
        <?php }
          if ($count==0 ){ ?>
            <div class="sondage">
              <h2>Nouveau sondage</h2>
              <a href="creation.php"><i class="fas fa-plus-circle"></i></a>
            </div>
        <?php  } ?>
      <div class="sondage">
        <h2><?=$forms[$i]['titre_formulaire']?><br></h2>
        <a href="administer.php?id=<?=$forms[$i]['id_formulaire']?>" class="waves-effect waves-light btn" >administer</a>
      </div>
      <?php
        $count_slide++;
        if($count_slide==5 || $decount==0){
         $count_slide=0; ?>
         <div class="sondage">
           <h2>Nouveau sondage</h2>
            <a href="./creation.php"><i class="fas fa-plus-circle"></i></a>
         </div>
      <?php }
      if ($count_slide==0){ ?>
      </div>
      <?php }
    } ?>
  </main>

  <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
  <!-- <script type="text/javascript" src="../assets/js/materialize.min.js"></script> -->
  <script type="text/javascript" src="../assets/js/fontawesome-all.min.js"></script>
  <script type="text/javascript" src="../assets/js/slick.js"></script>
  <script type="text/javascript" src="../assets/js/slider.js"></script>
</body>
</html>
