<?php

class Entreprise
{

  private $id;
  private $nom;
  private $adresse1;
  private $adresse2;
  priavte $codePostal;
  private $ville;
  private $cedex;
  private $pays;
  private $telephone;
  private $codeAPE;

  public function __construct($id, $nom, $adresse1, $adresse2, $codePostal, $ville, $cedex, $pays, $telephone, $codeAPE)
  {
    $this->setId($id);
    $this->setNom($nom);
    $this->setAdresse1($adresse1);
    $this->setAdresse2($adresse2);
    $this->setCodePostal($codePostal);
    $this->setVille($ville);
    $this->setCedex($cedex);
    $this->setPays($pays);
    $this->setTelephone($telephone);
    $this->setCodeAPE($codeAPE);
  }
  
//----------------------------------GETTERS---------------------------------------
  public function getId()
  {
    return $this->id;
  }
  
  public function getNom()
  {
   return $this->nom; 
  }
  
  public function getAdresse1()
  {
    return $this->adresse1;
  }
  
  public function getAdresse2()
  {
    return $this->adresse2;
  }
  
  public function getCodePostal()
  {
    return $this->codePostal;
  }
  
  public function getVille()
  {
    return $this->ville;
  }
  
  public function getCedex()
  {
    return $this->cedex;
  }
  
  public function getPays()
  {
    return $this->pays;
  }
  
  public function getTelephone()
  {
    return $this->telephone;
  }
  
  public function getCodeAPE()
  {
    return $this->codeAPE;
  }

}

?>
