<?php

class Personne {

	//-------------------VARIABLES-------------------
	private $id;
	private $nom; //Nom d'usage.
	private $nomPatronymique;
	private $prenom;
	private $mail;

	//-------------------CONSTRUCTORS-------------------
	public function __construct($id, $nom, $nomPatronymique, $prenom, $mail) {
		$this->setId($id);
		$this->setNom($nom);
		$this->setNomPatronymique($nomPatronymique);
		$this->setPrenom($prenom);
		$this->setMail($mail);
	}

	// -------------------GETTERS-------------------
	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getNomPatronymique() {
		return $this->nomPatronymique;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function getMail() {
		return $this->mail;
	}

	//-------------------SETTERS-------------------
	public function setId($id) {
		if(is_numeric($id) && $id >= 0)
			$this->id = $id;
		else
			throw new Exception("Id personne invalide : ".$id);
	}

	public function setNom($nom) {
		$this->nom = trim($nom);
	}

	public function setNomPatronymique($nomPatronymique) {
		$this->nomPatronymique = $nomPatronymique;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function setMail($mail) {
		$mailTraite = trim($mail);
		if((preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $mailTraite)) || ($mail == ""))
			$this->mail = $mailTraite;
		else
			throw new Exception("Mail incorrect ! : ".$mailTraite);
	}

	//-------------------tostring-------------------
	public function __toString() {
		return "Id : ".$this->id." Nom : ".$this->nom." Nom patronymique : "
			.$this->nomPatronymique." Prénom : ".$this->prenom." Mail : ".$this->mail;
	}

//-----------------------------Equals
	public function equals($aComparer)
	{
		if(get_class($aComparer) == "Personne")
		{
			return $this->id == $aComparer->getId();
		}else{
			return false;
		}
	}

}

?>
