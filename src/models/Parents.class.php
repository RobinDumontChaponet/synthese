<?php

class Parents
{
  
  private $id;
  private $adresse1;
  private $adresse2;
  private $codePostal;
  private $ville;
  private $pays;
  private $mobile;
  private $telephone;
  
  public function __construct($id, $adresse1, $adresse2, $codePostale, $ville, $pays, $mobile, $telephone)
  {
    $this->setId($id);
    $this->setAdresse1($adresse1);
    $this->setAdresse2($adresse2);
    $this->setCodePostal($codePostal);
    $this->setVille($ville);
    $this->setPays($pays);
    $this->setMobile($mobile);
    $this->setTelephone($telephone);
  }
  
//---------------------------------------------GETTERS------------------------------------------
  public function getId()
  {
    return $this->id;
  }
  
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

//----------------------------------------SETTERS----------------------------------------------
  public function setAdresse1($adresse1)
  {
	$this->adresse1 = trim($adresse1);
  }
	
  public function setAdresse2($adresse2)
  {
  	$this->adresse2 = trim($adresse2);
  }
	
  public function setCodePostale($codePostale)
  {
  	$this->codePostale = $codePostale;
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
  	if((preg_match("/^\+?\d+$/", $mobile)) or ($telephone==""))
   	{
  		$this->mobile = $mobile;	
  	}else
  	{
  		throw new Exception("Numéro de mobile invalide");
  	}
  }
  	
  public function setTelephone($telephone)
  {
  	if((preg_match("/^\+?\d+$/", $mobile)) or ($telephone==""))
  	{
  		$this->mobile = $mobile;	
  	}else
  	{
  		throw new Exception("Numéro de telephone invalide");
  	}
  }

//-----------------------------------------toString-----------------------------------------
  public function __toString()
  {
    return "Id : ".$this->id." Adresse1 : ".$this->adresse1." Adresse2 : ".$this->adresse2." CP : ".$this->codePostal
          ." Ville : ".$this->ville." Pays : ".$this->pays." Mobile : ".$this->mobile." Telephone : ".$this->telephone;
  }
}

?>
