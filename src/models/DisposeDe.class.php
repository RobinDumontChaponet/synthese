<?php

class DisposeDe
{
	private $typeProfil;
	private $droit; //Ceci est un tableau de droits
	private $page;

	public function __construct($typeProfil, $droit, $page)
	{
		$this->setTypeProfil($typeProfil);
		$this->setDroit($droit);
		$this->setPage($page);
	}

	//------------------------------GETTER--------------------------
	public function get_classProfil()
	{
		return $this->typeProfil;
	}

	public function getDroit()
	{
		return $this->droit;
	}

	public function getPage()
	{
		return $this->page;
	}

	//--------------------------------SETTER---------------------------
	public function setTypeProfil($typeProfil)
	{
		if (!empty($typeProfil))
		{
			$this->typeProfil = $typeProfil;
		} else {
			throw new Exception("Type profil dans DisposeDe est incorrect !");
		}
	}

	public function setDroit($droit)
	{
		if (!empty($droit))
		{
			$this->droit = $droit;
		} else {
			throw new Exception("Droit dans DisposeDe est incorrect !");
		}
	}

	public function setPage($page)
	{
		if (!empty($page))
		{
			$this->page = $page;
		} else {
			throw new Exception("Page dans DisposeDe est incorrect !");
		}
	}

	//-------------------------toString------------------------------------
	public function __toString()
	{
		return "TypeProdil : ".$this->typeProfil." Droit : ".$this->droit." Page : ".$this->page;
	}

}

?>
