<?php
class ancien
{

	private $idAncien;
	private $adresse1;
	private $adresse2;
	private $codePostale;
	private $ville;
	private $pays;
	private $mobile;
	private $telephone;
	private $imageProfil;
	private $imageTrombi;

//----------------------------------Constructeurs
  public function ancien()
  {
  }
  
    public function ancien($idAncien, $adresse1, $adresse2, $codePostale, $ville, $pays, $mobile, $telephone, $imageProfil, $imageTrombi)
  {
	$this->setIdAncien($idAncien);
	$this->setAdresse1($adresse1);
	$this->setAdresse2($adresse2);
	$this->setCodePostale($codePostale);
	$this->setVille($ville);
	$this->setPays($pays);
	$this->setMobile($mobile);
	$this->setTelephone($telephone);
	$this->setImageProfil($imageProfil);
	$this->setImageTrombi($imageTrombi);
  }

//----------------------------------GETTERS
	public function getIdAncien()
	{
		return $this->idAncien;
	}
	public function getAdresse1()
	{
		return $this->adresse1;
	}
	public function getAdresse2()
	{
		return $this->adresse2;
	}
	public function getCodePostale()
	{
		return $this->codePostale;
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

	public function setIdAncien($idAncien)
	{
		if(($idAncien != null) and ($idAncien > 0))
		{
			$this->idAncien = $idAncien;
		}else
		{
			throw new Exception("Id ancien invalide");
		}
	}
	public function setAdresse1($adresse1)
	{
		if(($adresse1 != null))
		{
			$this->adresse1 = trim($adresse1);
		}else
		{
			throw new Exception("Adresse 1 invalide");
		}
	}
	public function setAdresse2($adresse2)
	{
		if(($adresse2 != null))
		{
			$this->adresse2 = trim($adresse2);
		}else
		{
			throw new Exception("Adresse 2 invalide");
		}
	}
	public function setCodePostale($codePostale)
	{
		$this->codePostale = $codePostale;
	}
	public function setVille($ville)
	{
		$this->ville = $ville;
	}
	public function setPays($pays)
	{
		$this->pays = $pays;
	}
	public function setMobile($mobile)
	{
		$this->mobile = $mobile;
	}
	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;
	}
	public function setImageProfil($imageProfil)
	{
		$this->imageProfil = $imageProfil;
	}
	public function setImageTrombi($imageTrombi)
	{
		$this->imageTrombi = $imageTrombi;
	}
}
?>
