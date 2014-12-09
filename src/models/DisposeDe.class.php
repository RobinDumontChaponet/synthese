<?php

class DisposeDe
{
	private $typeProfil;
	private $droit;
	private $page;

	public function __construct($typeProfil, $droit, $page)
	{
		$this->setTypeProfil($typeProfil);
		$this->setDroit($droit);
		$this->setPage($page);
	}

	//------------------------------GETTER--------------------------
	public function getTypeProfil()
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
		if ($typeProfil != null)
		{
			$this->typeProfil = $typeProfil;
		} else {
			throw new Exception("Type profil dans DisposeDe est incorrect !");
		}
	}

	public function setDroit($droit)
	{
		if ($droit != null)
		{
			$this->droit = $droit;
		} else {
			throw new Exception("Droit dans DisposeDe est incorrect !");
		}
	}

	public function setPage($page)
	{
		if ($page != null)
		{
			$this->page = $page;
		} else {
			throw new Exception("Page dans DisposeDe est incorrect !");
		}
	}

	//-------------------------toString------------------------------------
	public function __toString()
	{
		return "TypeProdil : ".$this->typeProfil->__toString()." Droit : ".$this->droit->__toStirng()." Page : ".$this->page->__toString();
	}

}

?>
