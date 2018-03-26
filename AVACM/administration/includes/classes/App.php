<?php
  class App{
      static $database;
      static function getDatabase(){
        if(!self::$database){
            self::$database = new Database('localhost', 'avacm_sondages', '3306', 'UTF8', 'root', '', true);
        }
        return self::$database;
      }
  }

?>
