<?php

include_once(dirname(__FILE__)."/Personne.class.php");

class Ancien extends Personne
{
	private $adresse1;
	private $adresse2;
	private $codePostal;
	private $ville;
	private $pays;
	private $mobile;
	private $telephone;
	private $imageProfil;
	private $imageTrombi;

//----------------------------------Constructeurs
    public function __construct($id, $nom, $nomPatronymique, $prenom, $adresse1, $adresse2, $codePostal, $ville, $pays, $mobile, $telephone, $imageProfil, $imageTrombi)
  {
  	parent::__construct($id, $nom, $nomPatronymique, $prenom);
	$this->setIdAncien($idAncien);
	$this->setAdresse1($adresse1);
	$this->setAdresse2($adresse2);
	$this->setCodePostal($codePostal);
	$this->setVille($ville);
	$this->setPays($pays);
	$this->setMobile($mobile);
	$this->setTelephone($telephone);
	$this->setImageProfil($imageProfil);
	$this->setImageTrombi($imageTrombi);
  }

//----------------------------------GETTERS
	public function getAdresse1()
	{
		return $this->adresse1;
	}
	public function getAdresse2()
	{
		return $this->adresse2;
	}
	public function getCodePostal()
	{
		return $this->codePostal;
	}
	public function getVille()
	{
		return $this->ville;
	}
	public function getPays()
	{
		return $this->pays;
	}
	public function getMobile()
	{
		return $this->mobile;
	}
	public function getTelephone()
	{
		return $this->telephone;
	}
	public function getImageProfil()
	{
		return $this->imageProfil;
	}
	public function getImageTrombi()
	{
		return $this->imageTrombi;
	}

//----------------------------------SETTERS


	public function setAdresse1($adresse1)
	{
		$this->adresse1 = trim($adresse1);
	}
	public function setAdresse2($adresse2)
	{
		$this->adresse2 = trim($adresse2);
	}
	public function setCodePostal($codePostal)
	{
		$this->codePostal = $codePostal;
	}
	public function setVille($ville)
	{
		$this->ville = trim($ville);
	}
	public function setPays($pays)
	{
		$this->pays = trim($pays);
	}
	public function setMobile($mobile)
	{
		if((preg_match("/^\+?\d+$/", $mobile)) or ($mobile==""))
		{
			$this->mobile = $mobile;	
		}else
		{
			throw new Exception("Numéro de mobile invalide");
		}
	}
	public function setTelephone($telephone)
	{
		if((preg_match("/^\+?\d+$/", $telephone)) or ($telephone==""))
		{
			$this->telephone = $telephone;	
		}else
		{
			throw new Exception("Numéro de telephone invalide");
		}
	}
	public function setImageProfil($imageProfil)
	{
		$this->imageProfil = $imageProfil;
	}
	public function setImageTrombi($imageTrombi)
	{
		$this->imageTrombi = $imageTrombi;
	}
	
//--------------------------tostring
	public function __toString()
	{
		return Personne::toString()." Adresse1 : ".$this->adresse1." Adresse2 : ".$this->adresse2
			." CP : ".$this->codePostal." Ville : ".$this->ville
		      	." Pays : ".$this->pays." Mobile : ".$this->mobile." Telephone : ".$this->telephone;
	}
}
?>
