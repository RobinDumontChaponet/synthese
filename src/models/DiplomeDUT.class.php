<?php

include_once(dirname(__FILE__)."/Diplome.class.php");

class DiplomeDUT extends Diplome
{
	private $departementIUT;

	public function __construct($id, $libelle, $departementIUT)
	{
		parent::__construct($id, $libelle);
		$this->setDepartementIUT($departementIUT);
	}

	//----------------------------------GETTERS------------------------------
	public function getDepartementIUT()
	{
		return $this->departementIUT;
	}

	//---------------------------------SETTERS------------------------------
	public function setDepartementIUT($departementIUT)
	{
		if ($departementIUT != null)
		{
			$this->departementDUT = $departementIUT;
		} else {
			throw new Exception("Departement IUT dans Diplome DUT est incorrect !");
		}
	}

	//---------------------------------toString---------------------------------
	public function __toString()
	{
		return parent::__toString()." Departement IUT : ".$this->departementIUT;
	}

}

?>
