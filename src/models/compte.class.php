<?php

class Compte
{
  private $id;
  private $ndc;
  private $mdp;

  public function Compte($id, $ndc, $mdp)
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
      return $this->ndc
  }
  
  public function getMdp()
  {
      return $this->mdp;
  }

//------------------------------------------Setters
//------------------------------------------toString

  public function()
  {
      return "Id : ".$this->id." Nom de compte : ".$this->ndc." Mot de passe : ".$this->mdp;
  }

}


?>
