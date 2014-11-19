<?php
	
class Personne
{

	private $id;
	private $nom;
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
		return $this->$mail;
	}

//----------------------------------Setters
	public function setId($id)
	{
		if(($id != null) and ($id > 0))
		{
			$this->id = $id;
		}else
		{
			throw new Exception("Id personne invalide");
		}
	}
	
	public function setNom($nom)
	{
		$nomTraite = trim($nom);
		if(($nomTraite != null) and ($nomTraite != ""))
		{
			$this->nom = strtoupper($nomTraite);
		}else
		{
			throw new Exception("Nom incorrect");
		}
	}
	
	public function setNomPatronymique($nomPatronymique)
	{
		$nomPatronymiqueTraite = trim($nomPatronymique);
		if(($nomPatronymiqueTraite != null) and ($nomPatronymiqueTraite != ""))
		{
			$this->nomPatronymique = strtoupper($nomPatronymiqueTraite);
		}else
		{
			throw new Exception("Nom patronymique incorrect");
		}	
	}
	
	public function setPrenom($prenom)
	{
		$prenomTraite = trim($prenom);
		if(($prenomTraite != null) and ($prenomTraite != ""))
		{
			$this->prenom = strtoupper(substr($prenomTraite,0,1)).strtolower(substr($prenomTraite,1));
		}else
		{
			throw new Exception("Prenom incorrect");
		}
	}
	
	public function setMail($mail)
	{
		$mailTraite = trim($mail);
		if(($mailTraite != null) and (($mailTraite == "") or (preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $mailTraite))))
		{
			$this->mail = $mailTraite;	
		}else
		{
			throw new Exception("Mail incorrect !");
		}
	}
	
//------------------------------tostring
	public function __toString()
	{
		return "Id : ".$this->id." Nom : ".$this->nom." Nom patronymique : "
			.$this->nomPatronymique." Prénom : ".$this->prenom;
	}
}
	
?>
