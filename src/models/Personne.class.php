<?php
	
class Personne
{

	private $id;
	private $nom;
	private $nomPatronymique;
	private $prenom;
	
	public function __construct($id, $nom, $nomPatronymique, $prenom)
	{
		$this->setId($id);
		$this->setNom($nom);
		$this->setNomPatronymique($nomPatronymique);
		$this->setPrenom($prenom);
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
	
	public function getNomPatroymique()
	{
		return $this->nomPatronymique;
	}
	
	public function getPrenom()
	{
		return $this->prenom;
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
	
//------------------------------tostring
	public function __toString()
	{
		return "Id : ".$this->id." Nom : ".$this->nom." Nom patronymique : "
			.$this->nomPatrnoymique." Prénom : ".$this->prenom;
	}
}
	
?>
