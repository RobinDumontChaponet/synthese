<?php

class Compte
{
  private $id;
  private $ndc;
  private $mdp;

  public function __construct($id, $ndc, $mdp)
  {
      $this->setId($id);
      $this->setNdc($ndc);
      $this->setMdp($mdp);
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
//------------------------------------------toString

  public function __toString()
  {
      return "Id : ".$this->id." Nom de compte : ".$this->ndc." Mot de passe : ".$this->mdp;
  }

}


?>
