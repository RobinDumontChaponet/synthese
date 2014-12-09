<?php
class Specialisation
{
  private $id;
  private $libelle;
  private $typeSpecialisation;
  
  public function __construct($id, $libelle, $typeSpecialisation)
  {
      $this->setId($id);
      $this->setLibelle($libelle);
      $this->setSpecialisation($typeSpecialisation);
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
  
  public function getTypeSpecialisation()
  {
      return $this->typeSpecialisation;
  }
//--------------------------------------------Setters
  public function setId($id)
  {
    if(($id != null) and ($id >= 0))
    {
        $this->id = $id;
    }else
    {
        throw new Exception("Id spécialisation incorrect");
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
        throw new Exception("Libellé spécialisation incorrect");
    }
  }
  
  public function setTypeSpecialisation($typeSpecialisation)
  {
    if($typeSpecialisation != null)
    {
      $this->typeSpecialisation = $typeSpecialisation;
    }else
    {
      throw new Exception("Spécialisation nulle");
    }
  }
//-------------------------------------------toString
  public function __toString()
  {
    return "Id : ".$this->id." Libellé : ".$this->libelle." Type spécialisation : ".$this->typeSpecialisation;
  }
}
?>
