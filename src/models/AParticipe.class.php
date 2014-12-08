<?php

class AParticipe
{
    
    private $ancien;
    private $evenement;
    
    public function __construct($ancien, $evenement)
    {
        $this->setAncien($ancien);
        $this->setEvenement($evenement);
    }
    
    //-------------------------GETTER------------------------------------------
    public function getAncien()
    {
        return $this->ancien;
    }
    
    public function getEvenement()
    {
        return $this->evenement;
    }
    //-------------------------SETTER------------------------------------------
    public function setAncien($ancien)
    {
        if($ancien != null)
        {
            $this->ancien = $ancien;
        }else{
            throw new Exception("Ancien dans AParticipe est incorrect !");
        }
    }
    
    public function setEvenement($evenement)
    {
        if($evenement != null)
        {
            $this->evenement = $evenement;
        }else{
            throw new Exception("Evenement dans AParticipe est incorrect !");
        }
    }
    //-------------------------toString----------------------------------------
    public function __toString()
    {
        return "Ancien : ".$this->ancien->__toString()." Evenement : ".$this->evenement->__toString();
    }
    
}

?>
