<?php

class Compte
{
  private $id;
  private $ndc;
  private $mdp;
  private $personne;
  private $typeProfil;

  public function __construct($id, $ndc, $mdp, $personne, $typeProfil)
  {
      $this->setId($id);
      $this->setNdc($ndc);
      $this->setMdp($mdp);
      $this->setPersonne($personne);
      $this->setTypeProfil($typeProfil);
  }
  
//------------------------------------------Getters
  public function getId()
  {
      return $this->id;
  }
  
  public function getNdc()
  {
      return $this->ndc;
  }
  
  public function getMdp()
  {
      return $this->mdp;
  }
  
  public function getPersonne()
  {
    return $this->personne;
  }
  
  public function getTypeProfil()
  {
    return $this->typeProfil;
  }

//------------------------------------------Setters
  public function setId($id)
  {
    if(($id != null) and ($id >= 0))
    {
      $this->id = $id;
    }else
    {
      throw new Exception("Id compte incorrect");
    }
  }
  
  public function setNdc($ndc)
  {
    $ndcTraite = trim($ndc);
    if(($ndcTraite != null) and ($ndcTraite != ""))
    {
      $this->ndc = $ndcTraite;
    }else
    {
      throw new Exception("Nom de compte incorrect");
    }
  }
  
  public function setMdp($mdp)
  {
    $mdpTraite = trim($mdp);
    if(($mdp != null) and ($mdp != ""))
    {
      $this->mdp = $mdpTraite;
    }else
    {
      throw new Exception("Mot de passe incorrect");
    }
  }
  
  public function setPersonne($personne)
  {
    if($personne != null)
    {
      $this->personne = $personne;
    }else
    {
      throw new Exception("Personne dans Compte est incorrect !");
    }
  }
  
  public function setTypeProfil($typeProfil)
  {
    if($typeProfil != null)
    {
      $this->typeProfil = $typeProfil;
    }else
    {
      throw new Exception("Type profil dans Compte est incorrect");
    }
  }
//------------------------------------------toString

  public function __toString()
  {
      return "Id : ".$this->id." Nom de compte : ".$this->ndc." Mot de passe : ".$this->mdp." Personne : ".$this->personne->__toString()." Type profil : ".$this->typeProfil->__toString();
  }

}


?>
