<?php
class AEtudie 
{
//	VARIABLES

	private $ancien;
	private $diplomeDUT;
	private $departementIUT;
	private $promotion;

//	CONSTRUCTORS

	public function __construct($ancien, $diplomeDUT, $departementIUT, $promotion) {
		$this->setAncien($ancien);
		$this->setDiplomeDUT($diplomeDUT);
		$this->setDepartementIUT($departementIUT);
		$this->setPromotion($promotion);
	}

//	GETTERS & SETTERS

	public function getAncien() {
		return $this->ancien;
	}

    public function getDiplomeDUT() {
		return $this->diplomeDUT;
	}

	public function getDepartementIUT() {
		return $this->departementIUT;
	}

	public function getPromotion() {
		return $this->promotion;
	}

	public function setAncien($ancien) {
		if ($ancien != NULL)
			$this->ancien = $ancien;
		else
			throw new Exception('AEtudie.class.php : Ancien est NULL');
	}

	public function setDiplomeDUT($diplomeDUT) {
		if ($diplomeDUT != NULL)
			$this->diplomeDUT = $diplomeDUT;
		else
			throw new Exception('AEtudie.class.php : Diplome DUT est NULL');
	}

	public function setDepartementIUT($departementIUT) {
		if ($departementIUT != NULL)
			$this->departementIUT=$departementIUT;
		else
			throw new Exception('AEtudie.class.php : Departement IUT est NULL');
	}

	public function setPromotion($promotion) {
		if($promotion != NULL)
			$this->promotion = $promotion;
		else
			throw new Exception('AEtudie.class.php : Promotion est NULL');
	}

//	TO STRING

	public function __toString() {
		return "Ancien : ".$this->ancien." Diplome DUT : ".$this->diplomeDUT." Departement IUT : ".$this->departementIUT." Promotion : ".$this->promotion;
	}
}
?>
