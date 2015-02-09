<?php
class Poste {
	
	private $id;
	private $libelle;

	public function __construct($id, $libelle) {
		$this->setId($id);
		$this->setLibelle($libelle);
	}

//--------------------------------------------Getters
	public function getId() {
		return $this->id;
	}

	public function getLibelle() {
		return $this->libelle;
	}
//--------------------------------------------Setters
	public function setId($id) {
		$this->id = $id;
	}

	public function setLibelle($libelle) {
		$this->libelle = trim($libelle);
	}
//-------------------------------------------toString
	public function __toString() {
		return "Id : ".$this->id." Libellé : ".$this->libelle;
	}
} ?>
