<?php
class Etablissement {

	private $id;
	private $nom;
	private $adresse1;
	private $adresse2;
	private $codePostal;
	private $ville;
	private $pays;
	private $fax;
	private $web;

	public function __construct($id, $nom, $adresse1, $adresse2, $codePostal, $ville, $pays, $fax, $web) {
		$this->setId($id);
		$this->setNom($nom);
		$this->setAdresse1($adresse1);
		$this->setAdresse2($adresse2);
		$this->setCodePostal($codePostal);
		$this->setVille($ville);
		$this->setPays($pays);
		$this->setFax($fax);
		$this->setWeb($web);
	}

	//------------------------------GETTERS-------------------------
	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getAdresse1() {
		return $this->adresse1;
	}

	public function getAdresse2() {
		return $this->adresse2;
	}

	public function getCodePostal() {
		return $this->codePostal;
	}

	public function getVille() {
		return $this->ville;
	}

	public function getPays() {
		return $this->pays;
	}

	public function getFax() {
		return $this->fax;
	}

	public function getWeb() {
		return $this->web;
	}

	//---------------------------SETTERS----------------------------
	public function setId($id) {
		$this->id = $id;
	}

	public function setNom($nom) {
		$this->nom = trim($nom);
	}

	public function setAdresse1($adresse1) {
		$this->adresse1 = trim($adresse1);
	}

	public function setAdresse2($adresse2) {
		$this->adresse2 = trim($adresse2);
	}

	public function setCodePostal($codePostal) {
		$this->codePostal = $codePostal;
	}

	public function setVille($ville) {
		$this->ville = trim($ville);
	}

	public function setPays($pays) {
		$this->pays = trim($pays);
	}

	public function setFax($fax) {
		$this->fax = $fax;
	}

	public function setWeb($web) {
		$this->web = $web;
	}

	//-------------------------toString-------------------------------
	public function __toString() {
		return "Id : ".$this->id."Nom : ".$this->nom." Adresse1 : ".$this->adresse1." Adresse2 : ".$this->adresse2
		." CP : ".$this->codePostal." Ville : ".$this->ville
		." Pays : ".$this->pays." Fax : ".$this->fax." Web : ".$this->web;
	}

	//-------------------------Equals-------------------------------------
	public function equals($aComparer)
	{
		if(get_class($aComparer) == "Etablissement")
		{
			return $this->id == $aComparer->getId();
		}else
		{
			return false;
		}
	}
}

?>
