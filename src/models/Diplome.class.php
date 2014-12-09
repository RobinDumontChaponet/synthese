<?php

abstract class Diplome
{
	private $id;
	private $libelle;

	public function __construct($id, $libelle)
	{
		$this->setId($id);
		$this->setLibelle($libelle);
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

	//--------------------------------------------Setters

	public function setId($id)
	{
		if
		(($id != null) and ($id >= 0))
		{
			$this->id = $id;
		} else {
			throw new Exception("Id diplome incorrect");
		}
	}

	public function setLibelle($libelle)
	{
		$libelleTraite = trim($libelle);
		if (($libelleTraite != null) and ($libelleTraite != ""))
		{
			$this->libelle = $libelleTraite;
		} else {
			throw new Exception("Libellé diplome incorrect");
		}
	}
	//-------------------------------------------toString
	public function __toString()
	{
		return "Id : ".$this->id." Libellé : ".$this->libelle;
	}

}

?>
