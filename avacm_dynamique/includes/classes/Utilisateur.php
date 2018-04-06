<?php
  class Utilisateur{

    private $id ;
    private $statut ;
    private $etiquette;
    private $sexe;
    private $age;
    private $description;
    private $dateReponse;

    public function __construct($identifiant = null){
      if(isset($identifant)){
        $parameters=array($identifiant);
        $utilisateur = App::$database->query("SELECT * FROM utilisateur WHERE id_utilisateur=?",$parameters)->fetch(PDO::FETCH_OBJ);
        $this->id = $utilisateur->id_utilisateur;
        $this->statut = $utilisateur->statut_utilisateur;
        $this->etiquette = $utilisateur->etiquette_utilisateur;
        $this->sexe = $utilisateur->sexe_utilisateur;
        $this->age = $utilisateur->age_utilisateur;
        $this->description = $utilisateur->description_utilisateur;
        $this->date_reponse = $utilisateur->dateReponse;
      } else {
        $this->setUtilisateur($_POST['age_utilisateur'],$_POST['sexe_utilisateur'],$_POST['etiquette_utilisateur'],$_POST['statut_utilisateur']);
      }
    }


    //getters
    public function getId(){
      return $this->id;
    }

    public function getStatut(){
      return $this->statut;
    }

    public function getEtiquette(){
      return $this->etiquette;
    }

    public function getSexe(){
      return $this->sexe;
    }

    public function getAge(){
      return $this->age;
    }

    public function getDescription(){
      return $this->description;
    }

    public function getDateReponse(){
      return $this->dateReponse;
    }

    //setters

    public function setStatut(){
       $this->statut = $value;
    }

    public function setEtiquette(){
       $this->etiquette = $value;
    }

    public function setSexe(){
       $this->sexe = $value;
    }

    public function setAge(){
       $this->age = $value;
    }

    public function setDescription(){
       $this->description = $value;
    }

    public function setDateReponse(){
       $this->description = $value;
    }

    public function setUtilisateur($age,$sexe,$etiquette,$statut){
      if(isset($age) && isset($sexe)  && isset($etiquette)  && isset($statut)){
        $age=strip_tags($age);
        $sexe=strip_tags($sexe);
        $etiquette=strip_tags($etiquette);
        $statut=strip_tags($statut);
        $parameters = array($age,$sexe,$etiquette,$statut);
        App::$database->query("INSERT INTO utilisateur (age_utilisateur,sexe_utilisateur,etiquette_utilisateur,statut_utilisateur) values (?,?,?,?)",$parameters);
        $this->id = App::$database->lastInsertId();
        $this->statut = $statut;
        $this->sexe = $sexe;
        $this->age = $age;
        $this->etiquette = $etiquette;
      }
    }


  }
?>
