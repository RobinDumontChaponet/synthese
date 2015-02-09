<?php

include_once(MODELS_INC."Diplome.class.php");

class DiplomeDUT extends Diplome
{
	private $departementIUT;

	public function __construct($id, $libelle, $departementIUT) {
		parent::__construct($id, $libelle);
		$this->setDepartementIUT($departementIUT);
	}

	//----------------------------------GETTERS------------------------------
	public function getDepartementIUT() {
		return $this->departementIUT;
	}

	//---------------------------------SETTERS------------------------------
	public function setDepartementIUT($departementIUT) {
		$this->departementIUT = $departementIUT;
	}

	//---------------------------------toString---------------------------------
	public function __toString() {
		return parent::__toString()." Departement IUT : ".$this->departementIUT;
	}

	//---------------------------------Equals--------------------------------------
	public function equals($aComparer) {
		if(get_class($aComparer) == "DiplomeDUT") {
			return $this->id == $aComparer->getId();
		} else {
			return false;
		}
	}
}

?>
