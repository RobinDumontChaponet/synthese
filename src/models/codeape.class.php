<?php

class CodeAPE
{

  private $code;
  private $libelle;

  public function __construct($id, $libelle)
  {
      $this->setCode($code);
      $this->setLibelle($libelle);
  }
  
//--------------------------------------------Getters
  public function getCode()
  {
      return $this->code;
  }
  
  public function getLibelle()
  {
      return $this->libelle;
  }
//--------------------------------------------Setters
  public function setId($code)
  {
    if(($id != null) and ($code >= 0))
    {
        $this->id = $id;
    }else
    {
        throw new Exception("Code ape incorrect");
    }
  }
  public function setLibelle($libelle)
  {
    $libelleTraite = trim($libelle);
    if(($libelleTraite != null) and ($libelleTraite != ""))
    {
        $this->libelle = $libelleTraite;
    }else
    {
        throw new Exception("Libellé diplome incorrect");
    }
  }
//-------------------------------------------toString
  public function __toString()
  {
    return "Code : ".$this->code." Libellé : ".$this->libelle;
  }
}

}

?>
