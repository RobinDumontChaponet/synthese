<?php

class Entreprise
{

  private $id;
  private $nom;
  private $adresse1;
  private $adresse2;
  private $codePostal;
  private $ville;
  private $cedex;
  private $pays;
  private $telephone;
  private $codeAPE;

  public function __construct($id, $nom, $adresse1, $adresse2, $codePostal, $ville, $cedex, $pays, $telephone, $codeAPE)
  {
    $this->setId($id);
    $this->setNom($nom);
    $this->setAdresse1($adresse1);
    $this->setAdresse2($adresse2);
    $this->setCodePostal($codePostal);
    $this->setVille($ville);
    $this->setCedex($cedex);
    $this->setPays($pays);
    $this->setTelephone($telephone);
    $this->setCodeAPE($codeAPE);
  }
  
//----------------------------------GETTERS---------------------------------------
  public function getId()
  {
    return $this->id;
  }
  
  public function getNom()
  {
   return $this->nom; 
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
  
  public function getCedex()
  {
    return $this->cedex;
  }
  
  public function getPays()
  {
    return $this->pays;
  }
  
  public function getTelephone()
  {
    return $this->telephone;
  }
  
  public function getCodeAPE()
  {
    return $this->codeAPE;
  }

//----------------------------------------SETTERS-----------------------------------------
public function setId($id)
	{
		if(($id != null) and ($id >= 0))
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
			throw new Exception("Nom entreprise incorrect");
		}
	}
	
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
	
	public function setCedex($cedex)
	{
	  if(($cedex != null) and (is_numeric($cedex)))
	  {
	    $this->cedex = $cedex;
	  }else
	  {
	    throw new Exception("Numero cedex incorrect");
	  }
	}
	
	public function setPays($pays)
	{
		$this->pays = trim($pays);
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
	
	public function setCodeAPE($code)
	{
	  $this->code->setCode($code->getCode());
	  $this->code->setLibelle($code->getLibelle());
	}
	
	
//---------------------------------------------toString-------------------------------------------
  public function __toString()
  {
    return "Id : ".$this->id." Nom : ".$this->nom." Adresse1 : ".$this->adresse1." Adresse2 : ".$this->adresse2
        ." CP : ".$this->codePostal." Ville : ".$this->ville." CEDEX".$this->cedex." Pays : ".$this->pays
        ." Telephone : ".$this->telephone." Code APE : ".$this->codeAPE->toString();
  }

}

?>
