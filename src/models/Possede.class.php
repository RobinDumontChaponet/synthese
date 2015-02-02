<?php
class Possede {

	//-------------------VARIABLES-------------------
	private $ancien;
	private $etablissement;
	private $diplomePostDUT;
	private $resultat;
	private $dateDebut;
	private $dateFin;

	//-------------------CONSTRUCTORS-------------------
	public function __construct($ancien, $etablissement, $diplomePostDUT, $resultat, $dateDebut, $dateFin) {
		$this->setAncien($ancien);
		$this->setEtablissement($etablissement);
		$this->setDiplomePostDUT($diplomePostDUT);
		$this->setResultat($resultat);
		$this->setDateDebut($dateDebut);
		$this->setDateFin($dateFin);
	}
	
	//-------------------GETTERS-------------------
	public function getAncien() {
		return $this->ancien;
	}
	
	public function getEtablissement() {
		return $this->etablissement;
	}
	
	public function getDiplomePostDUT() {
		return $this->diplomePostDUT;
	}
	
	public function getResultat() {
		return $this->resultat;
	}
	
	public function getDateDebut() {
		return $this->dateDebut;
	}
	
	public function getDateFin() {
		return $this->dateFin;
	}
	
	//-------------------SETTERS-------------------
	public function setAncien($ancien) {
		if($ancien != NULL)
			$this->ancien = $ancien;
		else
			throw new Exception("Ancien dans Possede est NULL !");
	}

	public function setEtablissement($etablissement) {
		if($etablissement != NULL)
			$this->etablissement = $etablissement;
		else
			throw new Exception("Etablissement dans Possede est NULL !");
	}
	
	public function setDiplomePostDUT($diplomePostDUT) {
		if($diplomePostDUT != NULL)
			$this->diplomePostDUT = $diplomePostDUT;
		else
			throw new Exception("DiplomePostDUT dans Possede est NULL !");
	}
	
	public function setDateDebut($dateDebut) {
		$this->dateDebut = $dateDebut;
	}
	public function setResultat($res){
		$this->resultat=$res;    
	}
	
	public function setDateFin($dateFin) {
		$this->dateFin = $dateFin;
	}

	//-------------------tostring-------------------
	public function __toString() {
		return "Ancien : ".$this->ancien." Etablissement : ".$this->etablissement." Diplome post DUT : ".$this->diplomePostDUT." Date debut : ".$this->dateDebut." Date fin : ".$this->dateFin;
	}
	
}
?>
