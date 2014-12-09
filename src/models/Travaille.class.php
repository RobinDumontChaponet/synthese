<?php

class Travaille
{

  private $entreprise;
  private $poste;
  private $ancien;
  private $dateEmbaucheDeb;
  private $dateEmbaucheFin;

  public function __construct($entreprise, $poste, $ancien, $dateEmbaucheDeb, $dateEmbaucheFin)
  {
    $this->setIdEntreprise($entreprise);
    $this->setIdPoste($poste);
    $this->setIdAncien($ancien);
    $this->setDateEmbaucheDeb($dateEmbaucheDeb);
    $this->dateEmbaucheFin($idEmbaucheFin);
  }
  
//--------------------------------------------GETTERS--------------------------------
  public function getEntreprise()
  {
    return $this->entreprise;
  }
  
  public function getPoste()
  {
    return $this->poste;
  }
  
  public function getAnicen()
  {
    return $this->ancien;
  }
  
  public function getDateEmbaucheDebut()
  {
    return $this->dateEmbaucheDebut;
  }
  
  public function getDateEmbaucheFin()
  {
    return $this->dateEmbaucheFin();
  }
  
//-------------------------------------------SETTERS------------------------------
  public function setEntreprise($entreprise)
  {
    if($entreprise != null)
    {
        $this->entreprise = $entreprise;
    }else
    {
        throw new Exception("Entreprise dans Travaille incorrecte");
    }
  }
  
  public function setPoste($poste)
  {
    if($poste != null)
    {
        $this->poste = $poste;
    }else
    {
        throw new Exception("Poste dans Travaille incorrect");
    }
  }
  
  public function setAncien($ancien)
  {
    if($ancien != null)
      {
          $this->ancien = $ancien;
      }else
      {
          throw new Exception("Ancien dans Travaille incorrect");
      }
  }

  public function setDateEmbaucheDeb($date)
  {
    if($date != null)
    {
      $this->dateEmbaucheDeb = $date;
    }else
    {
      throw new Exception("Date embauche debut dans Travaille incorrecte");
    }
  }
  
  public function setDateEmbaucheFin($date)
  {
    //Pas de verifications car la date embauche fin peut etre nulle si il travaille encore dans l'entreprise.
      $this->dateEmbaucheFin = $date;
  }
  
  //---------------------------------toString--------------------------------------
  public function __toString()
  {
    return "Entreprise : ".$this->entreprise." Poste : ".$this->poste." Ancien : ".$this->ancien." Date embauche début : "$this->dateEmbaucheDeb." Date embauche fin : ".$this->dateEmbaucheFin;
  }

}

?>
