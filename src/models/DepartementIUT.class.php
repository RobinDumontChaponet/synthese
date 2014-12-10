<?php

class DepartementIUT
{

	private $id;
	private $nom;

	public function __construct($id, $nom)
	{
		$this->setId($id);
		$this->setNom($nom);
	}

	//--------------------------------GETTERS---------------------------------
	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}
	//--------------------------------SETTERS---------------------------------
	public function setId($id)
	{
		if (($id != null) and ($id >= 0))
		{
			$this->id = $id;
		} else {
			throw new Exception("Id departement IUT invalide");
		}
	}

	public function setNom($nom)
	{
		$nomTraite = trim($nom);
		if (($nomTraite != null) and ($nomTraite != ""))
		{
			$this->nom = strtoupper($nomTraite);
		} else {
			throw new Exception("Nom departement IUT incorrect");
		}
	}
	//--------------------------------toString--------------------------------

	public function __toString()
	{
		return "Id : ".$this->id." Nom : ".$this->nom;
	}

}

?>
