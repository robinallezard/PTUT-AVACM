<?php require_once './includes/autoloader.php';
Admin::getAdmin();
App::getDatabase();
if($_POST){
  if(isset($_POST['identifiant']) && isset($_POST['mdp'])){
    $login=strip_tags(($_POST['identifiant']));
    $password=strip_tags(($_POST['mdp']));
  if($login == Admin::$login && password_verify($password,Admin::$password) /*$password == Admin::$password*/ ){
      header("Location: ./administration/");
    } else {
      echo "<p>Mauvais couple login/mot de passe.<p>";
    }
  }
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
    <title>Connexion</title>
</head>

<body class="valign-wrapper">
    <div id="login">
        <img src="assets/img/logo.svg" class="responsive-img" alt="logo AVACM">
        <form action="" method="post">
            <div class="input-field">
                <input name="identifiant" id="identifiant" type="text" class="validate">
                <label for="identifiant">Votre login...</label>
            </div>
            <div class="input-field">
                <input name="mdp" id="mdp" type="password" class="validate">
                <label for="mdp">votre mot de passe...</label>
            </div>
             <button class="btn" type="submit" name="action">connexion
  </button>
        </form>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script type="text/javascript">


    </script>
</body>

</html>
