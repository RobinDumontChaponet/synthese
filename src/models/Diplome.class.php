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

	public function setId($id) {
		if ($id >= 0)
			$this->id = $id;
		else
			throw new Exception("Id diplome incorrect");
	}

	public function setLibelle($libelle) {
		$this->libelle = $libelleTraite;
	}
	//-------------------------------------------toString
	public function __toString()
	{
		return "Id : ".$this->id." Libellé : ".$this->libelle;
	}
	
	//------------------------------------------Equals
	public function equals($aComparer)
	{
		if(get_class($aComparer) == "Diplome")
		{
			return $this->id == $aComparer->getId();	
		}else
		{
			return false;
		}
	}

}

?>
