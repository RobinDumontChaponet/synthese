<?php

class Post {

	private $id;
	private $posteur;
	private $date;
	private $contenu;
	private $approuve;
	private $coms;

	public function __construct($id, $posteur, $date, $contenu, $approuve, $coms) {
		$this->setId($id);
		$this->setPosteur($posteur);
		$this->setDate($date);
		$this->setContenu($contenu);
		$this->setApprouve($approuve);
		$this->setComs($coms);
	}

	// Getters
	public function getId() {
		return $this->id;
	}

	public function getPosteur() {
		return $this->posteur;
	}

	public function getdate() {
		return $this->date;
	}

	public function getContenu() {
		return $this->contenu;
	}

	public function getApprouve() {
		return $this->approuve;
	}

	public function getComs() {
		return $this->coms;
	}
	//setters

	public function setId($id) {
		if ($id!=null && $id>-1 && is_numeric($id)) {
			$this->id=$id;
		} else {
			throw new Exception('post.class.php -> id incorrect : '.'"'.$id.'"');
		}
	}

	public function setDate($date) {
		if ($date!=null) {
			$this->date=$date;
		} else {
			throw new Exception('post.class.php -> date incorrecte : '.'"'.$date.'"');
		}
	}

	public function setPosteur($c) {
		if (get_class($c)=="Personne") {
			$this->posteur=$c;
		} else {
			$this->posteur=null;
		}
	}

	public function setContenu($c) {
		if ($c!=null) {
			$this->contenu=$c;
		} else {
			throw new Exception('post.class.php -> Contenu incorrect : '.'"'.$c.'"');
		}
	}

	public function setApprouve($app) {
		if (is_bool($app)) {
			$this->approuve=$app;
		} else {
			throw new Exception('post.class.php -> approuve incorrect : '.'"'.$app.'"');
		}
	}

	public function setComs($coms) {
		$this->coms=$coms;
	}
}

?>