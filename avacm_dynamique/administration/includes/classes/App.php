<?php
  class App{
      static $database;
      static function getDatabase(){
        if(!self::$database){
            self::$database = new Database('localhost', 'avacm_sondages', '3306', 'UTF8', 'administrateur_avacm', 'ykuRmMYVIGhHqNmm', true);
        }
        return self::$database;
      }
  }

?>