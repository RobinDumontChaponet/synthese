<?php

class DepartementIUT {

	private $id;
	private $nom;
	private $sigle;

	public function __construct($id, $nom, $sigle) {
		$this->setId($id);
		$this->setNom($nom);
		$this->setSigle($sigle);
	}

	//--------------------------------GETTERS---------------------------------
	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getSigle() {
		return $this->sigle;
	}

	//--------------------------------SETTERS---------------------------------
	public function setId($id) {
		if ($id != null and $id >= 0)
			$this->id = $id;
		else
			throw new Exception('Id departement IUT invalide');
	}

	public function setNom($nom) {
		$nom = trim($nom);
		if (!empty($nom))
			$this->nom = $nom;
		else
			throw new Exception('Nom departement IUT incorrect');
	}

	public function setSigle($sigle) {
		$sigle = trim($sigle);
		if (!empty($sigle))
			$this->sigle = $sigle;
		else
			throw new Exception('Sigle departement IUT incorrect : '.$sigle);
	}

	//--------------------------------toString--------------------------------

	public function __toString() {
		return 'Id : '.$this->id.'; Nom : '.$this->nom.'; Sigle'.$this->sigle.'; ';
	}

	//---------------------------------Equals-----------------------------------
	public function equals($aComparer) {
		if (get_class($aComparer) == 'DepartementIUT') {
			return $this->id == $aComparer->getId();
		} else {
			return false;
		}
	}

}

?>
