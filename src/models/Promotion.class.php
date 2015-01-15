<?php

class Promotion {

	private $id;
	private $annee;

	public function __construct($id, $annee) {
		$this->setId($id);
		$this->setAnnee($annee);
	}

	//----------------------------Getters
	public function getId() {
		return $this->id;
	}

	public function getAnnee() {
		return $this->annee;
	}

	//---------------------------Setters
	public function setId($id) {
		if (is_numeric($id) && $id >= 0) {
			$this->id = $id;
		} else {
			throw new Exception ("Id promotion incorrect");
		}
	}

	public function setAnnee($annee) {
		if (preg_match("/^[0-9][0-9][0-9][0-9]$/", $annee)) {
			$this->annee=$annee;
		} else {
			throw new Exception ('Année promotion incorrecte : '.'"'.$annee.'" ');
		}
	}


	//-----------------------------toString
	public function __toString() {
		return "Id : ".$this->id." Annee : ".$this->annee;
	}

	//-------------------------------Equals
	public function equals($aComparer) {
		if (get_class($aComparer) == "Promotion") {
			return $this->id == $aComparer->getId();
		} else {
			return false;
		}
	}

}
?>
