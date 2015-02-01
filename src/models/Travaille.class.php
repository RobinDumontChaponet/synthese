<?php
class Travaille {
	// VARIABLES

	private $entreprise;
	private $poste;
	private $ancien;
	private $dateEmbaucheDeb;
	private $dateEmbaucheFin;

	// CONSTRUCTORS

	public function __construct($entreprise, $poste, $ancien, $dateEmbaucheDeb, $dateEmbaucheFin) {
		$this->setEntreprise($entreprise);
		$this->setPoste($poste);
		$this->setAncien($ancien);
		$this->setDateEmbaucheDeb($dateEmbaucheDeb);
		$this->setDateEmbaucheFin($dateEmbaucheFin);
	}

	// SETTERS & GETTERS
	public function getEntreprise() {
		return $this->entreprise;
	}

	public function getPoste() {
		return $this->poste;
	}

	public function getAncien() {
		return $this->ancien;
	}

	public function getDateEmbaucheDeb() {
		return $this->dateEmbaucheDeb;
	}

	public function getDateEmbaucheFin() {
		return $this->dateEmbaucheFin;
	}

	public function setEntreprise($entreprise) {
		if ($entreprise != null)
			$this->entreprise = $entreprise;
		else
			throw new Exception("Entreprise dans Travaille incorrecte");
	}

	public function setPoste($poste) {
		if ($poste != null)
			$this->poste = $poste;
		else
			throw new Exception("Poste dans Travaille incorrect");
	}

	public function setAncien($ancien) {
		if ($ancien != null)
			$this->ancien = $ancien;
		else
			throw new Exception("Ancien dans Travaille incorrect");
	}

	public function setDateEmbaucheDeb($date) {
		$this->dateEmbaucheDeb = $date;
	}

	public function setDateEmbaucheFin($date) {
		$this->dateEmbaucheFin = $date; //Pas de vérification, la dateFin peut être nulle
	}

	// TO STRING
	public function __toString() {
		return "Entreprise : ".$this->entreprise."; Poste : ".$this->poste."; Ancien : ".$this->ancien."; Date embauche début : ".$this->dateEmbaucheDeb."; Date embauche fin : ".$this->dateEmbaucheFin.'; ';
	}
}
?>
