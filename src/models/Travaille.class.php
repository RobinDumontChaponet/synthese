<?php

class Travaille
{

  private $idEntreprise;
  private $idPoste;
  private $idAncien;
  private $dateEmbaucheDeb;
  private $dateEmbaucheFin;

  public function __construct($idEntreprise, $idPoste, $idAncien, $dateEmbaucheDeb, $dateEmbaucheFin)
  {
    $this->setIdEntreprise($idEntreprise);
    $this->setIdPoste($idPoste);
    $this->setIdAncien($idAncien);
    $this->setDateEmbaucheDeb($dateEmbaucheDeb);
    $this->dateEmbaucheFin($idEmbaucheFin);
  }
  
//--------------------------------------------GETTERS--------------------------------
  public function getIdEntreprise()
  {
    return $this->idEntreprise;
  }
  
  public function getIdPoste()
  {
    return $this->idPoste;
  }
  
  public function getIdAnicen()
  {
    return $this->idAncien;
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
  public function setIdEntreprise($id)
  {
    if(($id != null) and ($id > 0))
    {
        $this->id = $id;
    }else
    {
        throw new Exception("Id entreprise incorrect");
    }
  }
  
  public function setIdPoste($id)
  {
    if(($id != null) and ($id > 0))
    {
        $this->id = $id;
    }else
    {
        throw new Exception("Id poste incorrect");
    }
  }
  
  public function setIdAncien($id)
  {
    if(($id != null) and ($id > 0))
      {
          $this->id = $id;
      }else
      {
          throw new Exception("Id ancien incorrect");
      }
  }
  


}

?>
