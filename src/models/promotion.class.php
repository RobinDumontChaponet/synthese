<?php

class Promotion{
  
  private $id;
  private $annee;
  
  public function Promotion($id, $annee)
  {
      $this->setId($id);
      $this->setAnnee($annee);
  }
  
//----------------------------Getters
  public function getId()
  {
    return $this->id;
  }
  
  public function getAnnee()
  {
    return $this->annee;
  }
  
//---------------------------Setters
  public function($id)
  {
      if(($id != null) and ($id > 0))
      {
          $this->id = $id;
      }
      else
      {
          throw new Exception("Id incorrect");
      }
  }
  
  public function($annee)
  {
      if(preg_match("/^[0-9][0-9][0-9][0-9]$/", $annee))
      {
          $this->annee
      }
  }
  
  
//-----------------------------toString
  public function toString()
  {
      return "Id : ".$this->id." Annee : ".$this->annee;
  }

}
?>
