<?php 

class Evenement
{

  private $id;
  private $typeEvenement;
  private $date;
  private $commentaire;
  
  public function __construct($id, $typeEvenement, $date, $commentaire)
  {
    $this->setId($id);
    $this->setTypeEvenement($typeEvenement);
    $this->setDate($date);
    $this->setCommentaire($commentaire);
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
  
  public function getDate()
  {
  	return $this->date;
  }
  
  public function getCommentaire()
  {
  	return $this->commentaire;
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
	
	public function setCommentaire($commentaire)
	{
		$commentaireTraite = trim($commentaire);
		if($commentaireTraite != "")
		{
			$this->commentaire = $commentaireTraite;
		}else
		{
			$this->commentaire = "Aucun commentaire";
		}
	}
	

//-------------------------------------toString----------------------------------
  public function __toString()
  {
    return "Id : ".$this->id." Type evenement : ".$this->typeEvement." Date : ".$this->date." Commentaire : ".$this->commentaire;
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
