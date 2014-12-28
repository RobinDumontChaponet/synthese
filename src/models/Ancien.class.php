<?php

include_once(MODELS_INC."Personne.class.php");
include_once("validate.transit.inc.php");

class Ancien extends Personne {

	//-------------------VARIABLES-------------------
	private $adresse1;
	private $adresse2;
	private $codePostal;
	private $ville;
	private $pays;
	private $mobile;
	private $telephone;
	private $imageProfil;
	private $imageTrombi;
	private $parents;
	private $sexe;
	private $dateNaissance;

	//-------------------CONSTRUCTORS-------------------
	public function __construct($id, $nom, $nomPatronymique, $prenom, $adresse1, $adresse2, $codePostal, $ville, $pays, $mobile, $telephone, $imageProfil, $imageTrombi, $parents, $sexe, $dateNaissance, $mail) {
		parent::__construct($id, $nom, $nomPatronymique, $prenom, $mail);
		$this->setAdresse1($adresse1);
		$this->setAdresse2($adresse2);
		$this->setCodePostal($codePostal);
		$this->setVille($ville);
		$this->setPays($pays);
		$this->setMobile($mobile);
		$this->setTelephone($telephone);
		$this->setImageProfil($imageProfil);
		$this->setImageTrombi($imageTrombi);
		$this->setParents($parents);
		$this->setSexe($sexe);
		$this->setDateNaissance($dateNaissance);
	}

	//-------------------GETTERS-------------------
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

	public function getMobile() {
		return $this->mobile;
	}

	public function getTelephone() {
		return $this->telephone;
	}

	public function getImageProfil() {
		return $this->imageProfil;
	}

	public function getImageTrombi() {
		return $this->imageTrombi;
	}

	public function getParents() {
		return $this->parents;
	}

	public function getSexe() {
		return $this->sexe;
	}

	public function getDateNaissance() {
		return $this->dateNaissance;
	}

	//-------------------SETTERS-------------------
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

	public function setMobile($mobile) {
		$mobile=trim($mobile);
		if (empty($mobile) || is_valid_phoneNumber ($mobile)) {
			$this->mobile = $mobile;
		} else {
			throw new Exception('Ancien.class.php | Numéro de mobile invalide : '.'"'.$mobile.'" ');
		}
	}
	public function setTelephone($telephone) {
		$telephone=trim($telephone);
		if (empty($telephone) || is_valid_phoneNumber ($telephone)) {
			$this->telephone = $telephone;
		} else {
			throw new Exception('Ancien.class.php | Numéro de telephone fixe invalide : '.'"'.$telephone.'" ');
		}

	}

	public function setImageProfil($imageProfil) {
		$this->imageProfil = $imageProfil;
	}

	public function setImageTrombi($imageTrombi) {
		$this->imageTrombi = $imageTrombi;
	}

	public function setParents($parents) {
		$this->parents = $parents;
	}

	public function setSexe($sexe) {
		$sexe = trim($sexe);
		if (empty($sexe) || $sexe == 'f' || $sexe == 'm') {
			$this->sexe = $sexe;
		} else {
			throw new Exception('Ancien.class.php -> sexe incorrect : '.'"'.$sexe.'"');
		}
	}

	public function setDateNaissance($dateNaissance) {
		$this->dateNaissance = $dateNaissance;
	}

	//-------------------tostring-------------------
	public function __toString() {
		return parent::__toString()." Adresse1 : ".$this->adresse1." Adresse2 : ".$this->adresse2." CP : ".$this->codePostal." Ville : ".$this->ville." Pays : ".$this->pays." Mobile : ".$this->mobile." Telephone : ".$this->telephone." Parents : ".$this->parents." Sexe : ".$this->sexe;
	}
}
?>
