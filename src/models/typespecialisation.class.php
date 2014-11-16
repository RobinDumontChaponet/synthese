<?php
class TypeSpecialisation
{
  private $id;
  private $libelle;
  private $description
  
  public function __construct($id, $libelle, $description)
  {
      $this->setId($id);
      $this->setLibelle($libelle);
      $this->setDescription($description);
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
  
  public function getDescription()
  {
      return $this->description;
  }
//--------------------------------------------Setters
  public function setId($id)
  {
    if(($id != null) and ($id > 0))
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
  
  public function setDescription($description)
  {
    $descriptionTraitee = trim($description);
    if(($descriptionTraitee == null) or ($descriptionTraitee == ""))
    {
      $descriptionTraitee = "Aucune description";
    }
    $this->description = $descriptionTraitee;
  }
//-------------------------------------------toString
  public function __toString()
  {
    return "Id : ".$this->id." Libellé : ".$this->libelle." Descirption : ".$this->description;
  }
}
?>
