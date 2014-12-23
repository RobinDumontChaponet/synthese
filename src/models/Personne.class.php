<?php

class Personne
{

	private $id;
	private $nom; //Nom d'usage.
	private $nomPatronymique;
	private $prenom;
	private $mail;

	public function __construct($id, $nom, $nomPatronymique, $prenom, $mail)
	{
		$this->setId($id);
		$this->setNom($nom);
		$this->setNomPatronymique($nomPatronymique);
		$this->setPrenom($prenom);
		$this->setMail($mail);
	}

//----------------------------------Getters
	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getNomPatronymique()
	{
		return $this->nomPatronymique;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function getMail()
	{
		return $this->mail;
	}

//----------------------------------Setters
	public function setId($id)
	{
		if(is_numeric($id) && $id >= 0)
		{
			$this->id = $id;
		}else{
			throw new Exception("Id personne invalide : ".$id);
		}
	}

	public function setNom($nom)
	{
		$nomTraite = trim($nom);

		$this->nom = $nomTraite;
	}

	public function setNomPatronymique($nomPatronymique)
	{
		$nomPatronymiqueTraite = trim($nomPatronymique);

		if(($nomPatronymiqueTraite != null) and ($nomPatronymiqueTraite != ""))
		{
			$this->nomPatronymique = $nomPatronymiqueTraite;
		}else{
			throw new Exception("Nom patronymiqe incorrect : ".$nomPatronymique);
		}

	}

	public function setPrenom($prenom)
	{
		$prenomTraite = trim($prenom);
		if(($prenomTraite != null) and ($prenomTraite != ""))
		{
			$this->prenom = $prenomTraite;
		}else{
			throw new Exception("Prenom incorrect : ".$prenomTraite);
		}
	}

	public function setMail($mail)
	{
		$mailTraite = trim($mail);
		if((preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $mailTraite)) || ($mail == null) || ($mail == ""))
		{
			$this->mail = $mailTraite;
		}else{
			throw new Exception("Mail incorrect ! : ".$mailTraite);
		}
	}

//------------------------------tostring
	public function __toString()
	{
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
