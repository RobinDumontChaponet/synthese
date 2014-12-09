<?php

class AEtudie
{
    private $ancien;
    private $diplomeDUT;
    private $departementIUT;
    private $promotion;

    public function __construct($ancien, $diplomeDUT, $departementIUT, $promotion)
    {
        $this->setAncien($ancien);
        $this->setDiplomeDUT($diplomeDUT);
        $this->setDepartementIUT($departementIUT);
        $this->setPromotion($promotion);
    }

    //----------------------------GETTERS------------------------
    public function getAncien()
    {
        return $this->ancien;
    }

    public function getDiplomeDUT()
    {
        return $this->diplomeDUT;
    }

    public function getDepartementIUT()
    {
        return $this->departementDUT;
    }

    public function getPromotion()
    {
        return $this->promotion;
    }

    //------------------------------SETTERS------------------------
    public function setAncien($ancien)
    {
        if($ancien != null)
        {
            $this->ancien = $ancien;
        } else {
            throw new Exception("Ancien dans AEtudier est incorrect !");
        }
    }

    public function setDiplomeDUT($diplomeDUT)
    {
        if($diplomeDUT != null)
        {
            $this->diplomeDUT = $diplomeDUT;
        } else {
            throw new Exception("Diplome DUT dans AEtudier est incorrect !");
        }
    }

    public function setDepartementDUT($departementIUT)
    {
        if($departementIUT == null)
            throw new Exception("Departement IUT dans AEtudier est incorrect !");
        }
    }

    public function setPromotion($promotion)
    {
        if($promotion != null)
        {
            $this->promotions = $promotion;
        } else {
            throw new Exception("Promotion dans AEtudier est incorrect !");
        }
    }

    //--------------------------------toString----------------------------------------
    public function __toString()
    {
        return "Ancien : ".$this->ancien->__toString()." Diplome DUT : ".$this->diplomeDUT->toString()." Departement IUT : ".$this->departementIUT->__toString()." Promotion : ".$this->promotion->__toString();
    }
}

?>
