<?php

class Evenement {

	//-------------------VARIABLES-------------------
	private $id;
	private $typeEvenement;
	private $date;
	private $commentaire;

	//-------------------CONSTRUCTORS-------------------
	public function __construct($id, $typeEvenement, $date, $commentaire) {
		$this->setId($id);
		$this->setTypeEvenement($typeEvenement);
		$this->setDate($date);
		$this->setCommentaire($commentaire);
	}

	//-------------------GETTERS-------------------
	public function getId() {
		return $this->id;
	}

	public function getTypeEvenement() {
		return $this->typeEvenement;
	}

	public function getDate() {
		return $this->date;
	}

	public function getCommentaire() {
		return $this->commentaire;
	}

	//-------------------SETTERS-------------------
	public function setId($id) {
		if($id >= 0)
			$this->id = $id;
		else
			throw new Exception("Evenement.class.php : Id evenement invalide : ".$id);
	}

	public function setTypeEvenement($typeEvenement) {
		$this->typeEvenement = $typeEvenement;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setCommentaire($commentaire) {
		if(trim($commentaire) != '')
			$this->commentaire = trim($commentaire);
		else
			$this->commentaire = "Aucun commentaire";
	}


	//-------------------tostring-------------------
	public function __toString() {
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
