<?php

include_once(MODELS_INC."Diplome.class.php");

class DiplomeDUT extends Diplome {
	private $departementIUT;
	private $sigle;

	public function __construct($id, $libelle, $departementIUT, $sigle) {
		parent::__construct($id, $libelle);
		$this->setDepartementIUT($departementIUT);
	}

	//----------------------------------GETTERS------------------------------
	public function getDepartementIUT() {
		return $this->departementIUT;
	}

	public function getSigle() {
		return $this->sigle;
	}

	//---------------------------------SETTERS------------------------------
	public function setDepartementIUT($departementIUT) {
		$this->departementIUT = $departementIUT;
	}

	public function setSigle($sigle) {
		$this->sigle = $sigle;
	}

	//---------------------------------toString---------------------------------
	public function __toString() {
		return parent::__toString()." Departement IUT : ".$this->departementIUT;
	}

	//---------------------------------Equals--------------------------------------
	public function equals($aComparer) {
		if (get_class($aComparer) == "DiplomeDUT") {
			return $this->id == $aComparer->getId();
		} else {
			return false;
		}
	}
}

?>
