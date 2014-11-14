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
}
?>
