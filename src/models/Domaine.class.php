<?php

class Domaine
{

	private $id;
	private $libelle;
	private $description;

	public function __construct($id, $libelle, $description)
	{
		$this->setId($id);
		$this->setLibelle($libelle);
		$this->setDescription($description);
	}

	//-------------------------------GETTERS--------------------------------
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

	//--------------------------------SETTERS-------------------------------
	public function setId($id)
	{
		if (($id != null) and ($id >= 0))
		{
			$this->id = $id;
		} else {
			throw new Exception("Id personne invalide");
		}
	}

	public function setLibelle($libelle)
	{
		$libelleTraite = trim($libelle);
		if (($libelleTraite != null) and ($libelleTraite != ""))
		{
			$this->libelle = $libelleTraite;
		} else {
			throw new Exception("Libelle incorrect");
		}
	}

	public function setDescription($description)
	{
		$descriptionTraite = trim($description);
		if (($descriptionTraite != null))
		{
			if ($descriptionTraite != "")
			{
				$this->description = $descriptionTraite;
			} else {
				$this->description = "Aucune description !";
			}
		} else {
			throw new Exception("Description incorrecte");
		}
	}

	//-------------------------------toString--------------------------

	public function __toString()
	{
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
