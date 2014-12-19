<?php 

class Evenement
{

  private $id;
  private $typeEvenement;
  private $date;
  
  public function __construct($id, $typeEvenement, $date)
  {
    $this->setId($id);
    $this->setTypeEvenement($typeEvenement);
    $this->setDate($date);
  }
  
//-------------------------------------GETTERS----------------------------------
  public function getId()
  {
    return $this->id;
  }
  
  public function get_classEvenement()
  {
    return $this->typeEvenement;
  }
  
  public function getDate()
  {
  	return $this->date;
  }

//------------------------------------SETTERS------------------------------------
  public function setId($id)
	{
		if(($id != null) and ($id >= 0))
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
	
	public function setDate($date)
	{
		$this->date = $date;
	}
	

//-------------------------------------toString----------------------------------
  public function __toString()
  {
    return "Id : ".$this->id." Type evenement : "$this->typeEvement." Date : ".$this->date;
  }
  
  //-----------------------------------Equals-------------------------------------
  public function equals($aComparer)
	{
		if(get_class($aComparer) == "Evenement")
		{
			return $this->id == $aComparer->getId();	
		}else
		{
			return false;
		}
	}

}


?>
