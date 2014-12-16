<?php

class CodeAPE
{

	private $code;
	private $libelle;

	public function __construct($code, $libelle)
	{
		$this->setCode($code);
		$this->setLibelle($libelle);
	}

	//--------------------------------------------Getters
	public function getCode()
	{
		return $this->code;
	}

	public function getLibelle()
	{
		return $this->libelle;
	}
	//--------------------------------------------Setters
	public function setCode($code)
	{
		$this->code = trim($code);
	}
	public function setLibelle($libelle)
	{
		$libelleTraite = trim($libelle);
		if (($libelleTraite != null) and ($libelleTraite != ""))
		{
			$this->libelle = $libelleTraite;
		} else {
			throw new Exception("Libellé ape incorrect");
		}
	}
	//-------------------------------------------toString
	public function __toString()
	{
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
