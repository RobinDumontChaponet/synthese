<?php
class AParticipe
{
//	VARIABLES

	private $ancien;
	private $evenement;

//	CONSTRUCTORS

	public function __construct($ancien, $evenement) {
		$this->setAncien($ancien);
		$this->setEvenement($evenement);
	}

//	GETTERS & SETTERS

	public function getAncien() {
		return $this->ancien;
	}

	public function getEvenement() {
		return $this->evenement;
	}

	public function setAncien($ancien) {
		if ($ancien != NULL)
			$this->ancien = $ancien;
		else
			throw new Exception("AParticipe.class.php : Ancien est NULL : ".$ancien);
	}

	public function setEvenement($evenement) {
		if ($evenement != NULL)
			$this->evenement = $evenement;
		else
			throw new Exception("AParticipe.class.php : Evenement est NULL : ".$evenement);
	}

//	TO STRING

	public function __toString() {
		return "Ancien : ".$this->ancien." Evenement : ".$this->evenement;
	}
}
?>
