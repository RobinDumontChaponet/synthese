<?php

class Etablissement
{
    private $id;
    private $nom;
    private $adresse1;
    private $adresse2;
    private $codePostal;
    private $ville;
    private $pays;
    
    public function __construct($id, $nom, $adresse1, $adresse2, $codePostal, $ville, $pays)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setAdresse1($adresse1);
        $this->setAdresse2($adresse2);
        $this->setCodePostal($codePostal);
        $this->setVille($ville);
        $this->setPays($pays);
    }
    
    //------------------------------GETTERS-------------------------
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
    
    //---------------------------SETTERS----------------------------
    public function setId($id)
    {
        if(($id != null) && ($id >= 0))
        {
            $this->id = $id;
        }else{
            throw new Exception("Id etablissement incorrect");
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
    
    //-------------------------toString-------------------------------
    public function __toString()
    public function __toString()
    {
        return "Id : ".$this->id." Adresse1 : ".$this->adresse1." Adresse2 : ".$this->adresse2
        ." CP : ".$this->codePostal." Ville : ".$this->ville
        ." Pays : ".$this->pays;
    }
}

?>
