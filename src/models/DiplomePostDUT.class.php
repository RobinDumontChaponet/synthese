<?php

class DiplomePostDUT extends Diplome
{
	private $domaine;

	public function __construct($id, $libelle, $domaine)
	{
		parent::__construct($id, $libelle);
		$this->setDomaine($domaine);
	}

	//-------------------------------------GETTERS------------------------
	public function getDomaine()
	{
		return $this->domaine;
	}

	//------------------------------------SETTERS-------------------------
	public function setDomaine($domaine)
	{
		if ($domaine != null)
		{
			$this->domaine = $domaine;
		} else {
			throw new Exception("Domaine dans DiplomePostDUT incorrect !");
		}
	}

	//----------------------------------toString--------------------------
	public function __toString()
	{
		return parent::__toString()." Domaine : ".$this->domaine;
	}
}
?>
