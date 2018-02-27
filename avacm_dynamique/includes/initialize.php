<?php
include 'configure.php';
try{
    $connexion = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port.';charset='.$charset.'',$login,$password);
    $connexion->setAttribute(PDO::ATTR_TIMEOUT,20);

    if ($debug){
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
} catch (PDOException $exception){
    if ($debug){
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } else {
        echo "Le serveur de donnée est indisponible, merci de réessayer ultérieurement.";
    }
}
?>
