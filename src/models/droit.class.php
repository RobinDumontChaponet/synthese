<?php

class Droit
{

  private $id;
  private $libelle;

  public function Droit($id, $libelle)
  {
      $this->setId($id);
      $this->setLibelle($libelle);
  }
  
//--------------------------------------------Getters
  public function getId()
  {
      return $this->id;
  }
  
  public function getLibelle()
  {
      return $this->libelle;
  }

//--------------------------------------------Setters

  public function setId($id)
  {
    if(($id != null) and ($id != ""))
    {
        $this->id = $id;
    }else
    {
        throw new Exception("Id droit incorrect");
    }
  }

public function setLibelle($libelle)
{
  if()
  {
  }else
  {
  }
}
//-------------------------------------------toString

}

?>
