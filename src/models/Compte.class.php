<?php

include_once('strings.transit.inc.php');
include_once(MODELS_INC.'PersonneDAO.class.php');

class Compte {
	private $id;
	private $ndc;
	private $mdp;
	private $personne;
	private $typeProfil;

	public function __construct($id, $typeProfil, $personne, $ndc, $mdp) {
		$this->setId($id);
		$this->setTypeProfil($typeProfil);
		$this->setPersonne($personne);
		$this->setNdc($ndc);
		$this->setMdp($mdp);
	}

//------------------------------------------Getters
	public function getId() {
		return $this->id;
	}

	public function getNdc() {
		return $this->ndc;
	}

	public function getMdp() {
		return $this->mdp;
	}

	public function getPersonne() {
		return $this->personne;
	}

	public function getTypeProfil() {
		return $this->typeProfil;
	}

//------------------------------------------Setters
	public function setId($id) {
		if (is_numeric($id) && $id >= 0) {
			$this->id = $id;
		} else {
			throw new Exception("Id compte incorrect");
		}
	}

	public function setNdc($ndc) {
		$ndcTraite = trim($ndc);
		if (($ndcTraite != null) and ($ndcTraite != "")) {
			$this->ndc = $ndcTraite;
		} else {
			throw new Exception("Nom de compte incorrect");
		}
	}

	public function setMdp($mdp) {
		$mdpTraite = trim($mdp);
		if (($mdp != null) and ($mdp != "")) {
			$this->mdp = $mdpTraite;
		} else {
			throw new Exception("Mot de passe incorrect");
		}
	}

	public function setPersonne($personne) {
		if ($personne != null) {
			$this->personne = $personne;
		} else {
			throw new Exception("Personne dans Compte est incorrect !");
		}
	}

	public function setTypeProfil($typeProfil) {
		if ($typeProfil != null) {
			$this->typeProfil = $typeProfil;
		} else {
			throw new Exception("Type profil dans Compte est incorrect");
		}
	}

//------------------------------------------toString

	public function __toString() {
		return "Id : ".$this->id." Nom de compte : ".$this->ndc." Mot de passe : ".$this->mdp." Personne : ".$this->personne." Type profil : ".$this->typeProfil;
	}

//---------------------------------------------Equals
	public function equals($aComparer) {
		if (get_class($aComparer) == "Compte") {
			return $this->id == $aComparer->getId();
		} else {
			return false;
		}
	}

	public static function personne2LoginStr ($personne) {
		$alikes = PersonneDAO::countAlikeNames($personne);
		$namePart = cleanString(strtolower(substr($personne->getNomPatronymique(), 0, 4)));
		$numberPart='';
		$firstNamePart = cleanString(strtolower(substr($personne->getPrenom(), 0, 4)));

		if($alikes) {
			$numberPart=$alikes;
			while(CompteDAO::getCompteByNdc($namePart.$numberPart.$firstNamePart))
				$numberPart++;
		}

		return $namePart.$numberPart.$firstNamePart;
	}
}
?>
