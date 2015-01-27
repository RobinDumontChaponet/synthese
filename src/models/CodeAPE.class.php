<?php

class CodeAPE
{
//	VARIABLES
	private $code;
	private $libelle;

//	CONSTRUCTORS

	public function __construct($code, $libelle) {
		$this->setCode($code);
		$this->setLibelle($libelle);
	}

//	GETTERS & SETTERS

	public function getCode() {
		return $this->code;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setCode($code) {
		$this->code = trim($code);
	}

	public function setLibelle($libelle) {
		if (trim($libelle) != NULL && trim($libelle) != "")
			$this->libelle = $libelle;
		else
			throw new Exception("Libellé ape incorrect");
	}

//	TO STRING

	public function __toString() {
		return "Code : ".$this->code." Libellé : ".$this->libelle;
	}

	//-------------------------Equals
	public function equals($aComparer)
	{
		if(get_class($aComparer) == "CodeAPE")
		{
			return $this->id == $aComparer->getId();
		}else
		{
			return false;
		}
	}
}
?>
