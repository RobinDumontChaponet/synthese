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
  public function setId($id)
	{
		if(($id != null) and ($id > 0))
		{
			$this->id = $id;
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
