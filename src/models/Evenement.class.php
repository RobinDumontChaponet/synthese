<?php 

class Evenement
{

  private $id;
  private $typeEvenement;
  
  public function __construct($id, $typeEvenement)
  {
    $this->setId($id);
    $this->setTypeEvenement($typeEvenement);
  }
  
//-------------------------------------GETTERS----------------------------------
  public function getId()
  {
    return $this->id;
  }
  
  public function getTypeEvenement()
  {
    return $this->typeEvenement;
  }

//------------------------------------SETTERS------------------------------------
  public function setId($idAncien)
	{
		if(($idAncien != null) and ($idAncien > 0))
		{
			$this->idAncien = $idAncien;
		}else
		{
			throw new Exception("Id evenement invalide");
		}
	}
	
	public function setTypeEvenement($typeEvenement)
	{
	  if($typeEvenement != null)
	  {
	    $this->typeEvenement = $typeEvenement;
	  }else
	  {
	    throw new Exception("type evenement incorrect");
	  }
	}
	

//-------------------------------------toString----------------------------------
  public function __toString()
  {
    return "Id : ".$this->id." Type evenement : "$this->typeEvement->toString();
  }

}


?>
