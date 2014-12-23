<?php
class EstSpecialise
{
//	VARIABLES

	private $ancien;
	private $specialisation;

//	CONSTRUCTORS

	public function __construct($ancien, $specialisation) {
		$this->setAncien($ancien);
		$this->setSpecialisation($specialisation);
	}

//	GETTERS & SETTERS

	public function getAncien() {
		return $this->ancien;
	}

	public function getSpecialisation() {
		return $this->specialisation;
	}

	public function setAncien($ancien) {
		if ($ancien != null)
			$this->ancien = $ancien;
		else
			throw new Exception('EstSpecialise.class.php : Ancien est NULL');
    }

    public function setSpecialisation($specialisation) {
		if($specialisation != null)
			$this->specialisation = $specialisation;
		else
			throw new Exception('Specialisation dans EstSpecialise est NULL');
	}

//	TO STRING
	public function __toString() {
		return "Ancien : ".$this->ancien." Specialisation : ".$this->specialisation;
	}
}
