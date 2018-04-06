<?php
  class Formulaire{

    static $nb_formulaires;

    private $id ;
    private $titre ;
    private $description ;

    public function __construct($identifiant){
      $parameters=array($identifiant);
      $formulaire = App::$database->query("SELECT * FROM formulaire WHERE id_formulaire=?",$parameters)->fetch(PDO::FETCH_OBJ);
      $this->id = $formulaire->id_formulaire;
      $this->titre = $formulaire->titre_formulaire;
      $this->description = $formulaire->description_formulaire;
    }

    public function getId(){
      return $this->id;
    }

    public function getTitre(){
      return $this->titre;
    }

    public function getDescription(){
      return $this->description;
    }

    static function getNbFormulaires(){
      if(!self::$nb_formulaires){
        $formulaires = App::$database->query("SELECT * FROM formulaire")->fetchAll();
        self::$nb_formulaires=count($formulaires);
      }
      return self::$nb_formulaires;
    }

  }
?>
