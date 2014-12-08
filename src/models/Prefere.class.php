<?php

class Prefere
{
    
    private $ancien;
    private $typeEvement;
    
    public function __construct($ancien, $typeEvement)
    {
        $this->setAncien($ancien);
        $this->setTypeEvenement($typeEvement);
    }
    
    //---------------------------------GETTERS---------------------------
    public function getAncien()
    {
        return $this->ancien;
    }
    
    public function getTypeEvenement()
    {
        return $this->typeEvenement;
    }
    //---------------------------------SETTERS---------------------------
    public function setAncien($ancien)
    {
        if($ancien != null)
        {
            $this->ancien = $ancien;
        }else{
            throw new Exception("Ancien dans Prefere est incorrect !");
        }
    }
    
    public function setTypeEvenement($typeEvement)
    {
        if($typeEvement != null)
        {
            $this->typeEvenement = $typeEvement;
        }else{
            throw new Exception("Type evenement dans Prefere est incorrect !");
        }
    }
    
    //---------------------------------toString--------------------------
    public function __toString()
    {
        return "Ancien : ".$this->ancien->__toString()." Type evenement : ".$this->typeEvenement->__toString();
    }
    
}

?>
