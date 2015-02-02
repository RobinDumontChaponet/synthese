<?php

class Domaine
{

	private $id;
	private $libelle;
	private $description;

	public function __construct($id, $libelle, $description) {
		$this->setId($id);
		$this->setLibelle($libelle);
		$this->setDescription($description);
	}

	//-------------------------------GETTERS--------------------------------
	public function getId() {
		return $this->id;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function getDescription() {
		return $this->description;
	}

	//--------------------------------SETTERS-------------------------------
	public function setId($id) {
			$this->id = $id;
	}

	public function setLibelle($libelle) {
		$this->libelle = trim($libelle);
	}

	public function setDescription($description) {
		$this->description = trim($description);
	}

	//-------------------------------toString--------------------------

	public function __toString() {
		return "Id : ".$this->id." Libelle : ".$this->libelle." Description : ".$this->desciption;
	}

	//------------------------------Equals---------------------------------
	public function equals($aComparer)
	{
		if(get_class($aComparer) == "Domaine")
		{
			return $this->id == $aComparer->getId();
		}else
		{
			return false;
		}
	}

}


?>
