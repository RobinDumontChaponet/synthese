<?php

class EstSpecialise
{
    private $ancien;
    private $specialisation;

    public function __construct($ancien, $specialisation)
    {
        $this->setAncien($ancien);
        $this->setSpecialisation($specialisation);
    }

    //--------------------------------GETTERS--------------------
    public function getAncien()
    {
        return $this->ancien;
    }

    public function getSpecialisation()
    {
        return $this->specialisation;
    }

    //------------------------------------SETTERS------------------
    public function setAncien($ancien)
    {
        if($ancien != null)
        {
            $this->ancien = $ancien;
        } else {
            throw new Exception("Ancien dans EstSpecialise est incorrect !");
        }
    }

    public function setSpecialisation($specialisation)
    {
        if($specialisation != null)
        {
            $this->specialisation = $specialisation;
        } else {
            throw new Exception("Specialisation dans EstSpecialise est incorrecte !");
        }
    }

    //-----------------------------------toString---------------------------
    public function __toString()
    {
        return "Ancien : ".$this->ancien." Specialisation : ".$this->specialisation;
    }

}
