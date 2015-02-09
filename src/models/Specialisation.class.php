<?php
class Specialisation {
	private $id;
	private $libelle;
	private $typeSpecialisation;

	public function __construct($id, $libelle, $typeSpecialisation) {
		$this->setId($id);
		$this->setLibelle($libelle);
		$this->setTypeSpecialisation($typeSpecialisation);
	}

	//--------------------------------------------Getters
	public function getId() {
		return $this->id;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function getTypeSpecialisation() {
		return $this->typeSpecialisation;
	}

	//--------------------------------------------Setters
	public function setId($id) {
		$this->id = $id;
	}

	public function setLibelle($libelle) {
		$this->libelle = trim($libelle);
	}

	public function setTypeSpecialisation($typeSpecialisation) {
		if ($typeSpecialisation != NULL) {
			$this->typeSpecialisation = $typeSpecialisation;
		} else {
			throw new Exception("TypeSpecialisation nul");
		}
	}

	//-------------------------------------------toString
	public function __toString() {
		return "Id : ".$this->id." Libellé : ".$this->libelle." Type spécialisation : ".$this->typeSpecialisation;
	}

	//------------------------------------------Equals
	public function equals($aComparer) {
		if (get_class($aComparer) == "Specialisation") {
			return $this->id == $aComparer->getId();
		} else {
			return false;
		}
	}
}
?>
