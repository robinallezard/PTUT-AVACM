<?php
  class Admin{
    // identifiant de l'admin
    static $login = 'test';
    //mot de passe static
    static $password;
    //méthode pour mettre en place le mot de passe hashé.
    static function getAdmin(){
      if(!self::$password){
        //edition du mot de passe hashé, pourrait être stocké dans la base de donnée au besoin
        self::$password=password_hash("test", PASSWORD_BCRYPT);
      }
      return self::$password;
    }
  }
 ?>
