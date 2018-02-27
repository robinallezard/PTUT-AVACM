<?php
  class Database{

    //objet PDO qui fait le lien a la base de données
    private $pdo;

    //constructeur de la base de données
    public function __construct($host,$database_name,$port, $charset, $login, $password, $debug){
      try{
        $this->pdo = new PDO("mysql:host=$host;dbname=$database_name;port=$port;charset=$charset", $login, $password);
        $this->pdo->setAttribute(PDO::ATTR_TIMEOUT,20);
        if ($debug){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
      } catch (PDOException $exception){
          if ($debug){
              $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          } else {
              echo "Le serveur de donnée est indisponible, merci de réessayer ultérieurement.";
      }
    }
  }

  //Méthode pour les requêtes simples/préparées
  public function query($query, $parameters = false){
        if($parameters){
            $request = $this->pdo->prepare($query);
            $request->execute($parameters);
        }else{
            $request = $this->pdo->query($query);
        }
        return $request;
    }

    //Méthode pour accéder au dernier item modifier par son ID
    public function lastInsertId(){
       return $this->pdo->lastInsertId();
    }
}
?>
