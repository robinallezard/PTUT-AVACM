<?php
    // Meilleur autoloader universel en PHP 7
    //appelle la fonction inclusion
    //il transforme les spacenames en URL à partir de
    //la racine du projet

    spl_autoload_register('inclusion');

    function inclusion($class){
        $class=  str_replace("\\","/",$class);
        require_once ("./includes/classes/$class.php");
    }
?>
