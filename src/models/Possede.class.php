<?php

class Possede
{
    private $ancien;
    private $etablissement;
    private $diplomePostDUT;
    private $resultat;
    private $dateDebut;
    private $dateFin;
    
    public function __construct($ancien, $etablissement, $diplomePostDUT, $resultat, $dateDebut, $dateFin)
    {
        $this->setAncien($ancien);
        $this->setEtablissement($etablissement);
        $this->setDiplomePostDUT($diplomePostDUT);
        $this->setResultat($resultat);
        $this->setDateDebut($dateDebut);
        $this->setDateFin($dateFin);
    }
    
    //-------------------------------------GETTERS-----------------------
    public function getAncien()
    {
        return $this->ancien;
    }
    
    public function getEtablissement()
    {
        return $this->etablissement;
    }
    
    public function getDiplomePostDUT()
    {
        return $this->diplomePostDUT;
    }
    
    public function getResultat()
    {
        return $this->resultat;
    }
    
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    
    public function getDateFin()
    {
        return $this->dateFin;
    }
    
    //-------------------------------SETTERS------------------------------------
    public function setAncien($ancien)
    {
        if($ancien != null)
        {
            $this->ancien = $ancien;
        }else{
            throw new Exception("Ancien dans Possede est nul !");
        }
    }

    public function setEtablissement($etablissement)
    {
        if($etablissement != null)
        {
            $this->etablissement = $etablissement;
        }else{
            throw new Exception("Etablissement dans Possede est nul !");
        }
    }
    
    public function setDiplomePostDUT($diplomePostDUT)
    {
        if($diplomePostDUT != null)
        {
            $this->diplomePostDUT = $diplomePostDUT;
        }else{
            throw new Exception("Diplome post DUT dans Possede est nul !");
        }
    }
    
    public function setDateDebut($dateDebut)
    {
        if($dateDebut != null)
        {
            $this->dateDebut = $dateDebut;
        }else{
            throw new Exception("Date début dans Possede est nulle !");
        }
    }
    public function setResultat($res){
        $this->resultat=$res;    
    }
    
    public function setDateFin($dateFin) {
		$this->dateFin = $dateFin;
    }
    
    //----------------------------------------------toString---------------------------------------
    public function __toString()
    {
        return "Ancien : ".$this->ancien." Etablissement : ".$this->etablissement." Diplome post DUT : ".$this->diplomePostDUT." Date debut : ".$this->dateDebut." Date fin : ".$this->dateFin;
    }
    
}

?>
