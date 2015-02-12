<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Evenement.class.php");
require_once(MODELS_INC."TypeEvenementDAO.class.php");

class EvenementDAO {

	public static function getAll() {
		$lst=array();
		try {
			$req=SPDO::getInstance()->query("SELECT * FROM evenement");
			while ($res=$req->fetch()) {
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Evenement($res['idEvenement'], $type, $res['nom'], $res['date'], $res['commentaire']);
			}
		} catch(PDOException $e) {
			die('error get all Evenement '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM evenement WHERE idEvenement=?");
			$req->execute(array($id));
			if ($res=$req->fetch()) {
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				return new Evenement($res['idEvenement'], $type, $res['nom'], $res['date'], $res['commentaire']);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error get id Evenement '.$e->getMessage().'<br>');
		}
	}

	public static function getEvenementAnterieur($binf, $nb, &$nbTotal) {
		$lst = array();
		try {
			$sql="SELECT * FROM evenement  WHERE date<now() ORDER BY date DESC";
			if ($nb!=null) {
				if ($binf==null) { $binf=0; }
				$sql.=" LIMIT ".$binf.",".$nb."";
			}
			$nbTotal=EvenementDAO::getNbEvenementAnterieur();
			$req=SPDO::getInstance()->query($sql);
			while ($res=$req->fetch()) {
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Evenement($res['idEvenement'], $type, $res['nom'], $res['date'], $res['commentaire']);
			}
		} catch(PDOException $e) {
			die('error getEvenementAnterieur '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getNbEvenementAnterieur() {
		try {
			$req=SPDO::getInstance()->query("SELECT count(*) as nb FROM evenement  WHERE date<now() ORDER BY date DESC");
			if ($res=$req->fetch())
				return $res['nb'];
			else
				return 0;
		} catch(PDOException $e) {
			die('error getNbEvenementAnterieur '.$e->getMessage().'<br>');
		}
	}

	public static function getEvenementPosterieur($binf, $nb, &$nbTotal) {
		$lst=array();
		try{
			$sql="SELECT * FROM evenement  WHERE date>now()";
			if ($nb!=null) {
				if ($binf==null) { $binf=0; }
				$sql.=" LIMIT ".$binf.",".$nb."";
			}
			$nbTotal=EvenementDAO::getNbEvenementPosterieur();
			$req=SPDO::getInstance()->query($sql);
			while ($res=$req->fetch()) {
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Evenement($res['idEvenement'], $type, $res['nom'], $res['date'], $res['commentaire']);
			}
		} catch(PDOException $e) {
			die('error getEvenementPosterieur '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getNbEvenementPosterieur() {
		try {
			$req=SPDO::getInstance()->query("SELECT count(*) as nb FROM evenement  WHERE date>now()");
			if ($res=$req->fetch())
				return $res['nb'];
			else
				return 0;
		} catch(PDOException $e) {
			die('error getNbEvenementPosterieur '.$e->getMessage().'<br>');
		}
	}

	public static function getByAncienNotParticipePost($idPersonne, $binf, $nb, &$nbTotal) {
		try {
			$lst = array();
			$sql="SELECT idEvenement FROM evenement WHERE date>=now() AND idEvenement NOT IN
                    (SELECT idEvenement FROM aParticipe WHERE idPersonne=?)";
			if ($nb!=null) {
				if ($binf==null)
					$binf=0;
				$sql.=" LIMIT ".$binf.",".$nb."";
			}
			$nbTotal=EvenementDAO::getNbByAncienNotParticipePost($idPersonne);
			$req = SPDO::getInstance()->prepare($sql);
			$req->execute(array($idPersonne));
			while ($res=$req->fetch()) {
				$lst[]=EvenementDAO::getById($res['idEvenement']);
			}
		} catch(PDOException $e) {
			die('error get all Evenement '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getNbByAncienNotParticipePost($idPersonne) {
		try {
			$req = SPDO::getInstance()->prepare("SELECT count(idEvenement) as nb FROM evenement WHERE date>=now() AND idEvenement NOT IN (SELECT idEvenement FROM aParticipe WHERE idPersonne=?)");
			$req->execute(array($idPersonne));
			if ($res=$req->fetch())
				return $res['nb'];
			else
				return 0;
		} catch(PDOException $e) {
			die('error getNbByAncienNotParticipePost '.$e->getMessage().'<br>');
		}
	}

	public static function getByAncienWithoutDateNotInscri($idPersonne, $binf, $nb, &$nbTotal) {
		try {
			$lst = array();
			$sql="SELECT idEvenement FROM evenement WHERE date IS NULL AND idEvenement NOT IN
                    (SELECT idEvenement FROM aParticipe WHERE idPersonne=?)";
			if ($nb!=null) {
				if ($binf==null)
					$binf=0;
				$sql.=" LIMIT ".$binf.",".$nb."";
			}
			$nbTotal=EvenementDAO::getNbByAncienWithoutDateNotInscri($idPersonne);
			$req = SPDO::getInstance()->prepare($sql);
			$req->execute(array($idPersonne));
			while ($res=$req->fetch()) {
				$lst[]=EvenementDAO::getById($res['idEvenement']);
			}
		} catch(PDOException $e) {
			die('error getByAncienWithoutDateNotInscri '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getNbByAncienWithoutDateNotInscri($idPersonne) {
		try {
			$req = SPDO::getInstance()->prepare("SELECT count(idEvenement) as nb FROM evenement WHERE date IS NULL AND idEvenement NOT IN (SELECT idEvenement FROM aParticipe WHERE idPersonne=?)");
			$req->execute(array($idPersonne));
			if ($res=$req->fetch()) {
				return $res['nb'];
			} else {
				return 0;
			}
		} catch(PDOException $e) {
			die('error getNbByAncienWithoutDateNotInscri '.$e->getMessage().'<br>');
		}
	}

	public static function getEvenementWithoutDate($binf, $nb, &$nbTotal) {
		try {
			$lst = array();
			$sql="SELECT idEvenement FROM `evenement` WHERE date IS NULL";
			if ($nb!=null) {
				if ($binf==null) { $binf=0; }
				$sql.=" LIMIT ".$binf.",".$nb."";
			}
			$nbTotal=EvenementDAO::getNbEvenementWithoutDate();
			$req = SPDO::getInstance()->prepare($sql);
			$req->execute();
			while ($res=$req->fetch()) {
				$lst[]=EvenementDAO::getById($res['idEvenement']);
			}
		} catch(PDOException $e) {
			die('EvenementDAO : Error getEvenementWithoutDate '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getNbEvenementWithoutDate() {
		try {
			$req = SPDO::getInstance()->prepare("SELECT count(idEvenement) as nb FROM `evenement` WHERE date IS NULL");
			$req->execute();
			if ($res=$req->fetch())
				return $res['nb'];
			else
				return 0;
		} catch(PDOException $e) {
			die('EvenementDAO : Error getEvenementWithoutDate '.$e->getMessage().'<br>');
		}
	}

	public static function create(&$obj) {
		if (get_class($obj)=="Evenement") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `evenement`(`idTypeEvenement`, `nom`,`date`,`commentaire`) VALUES (?,?,?,?)");
				$req->execute(array($obj->getTypeEvenement()->getId(), $obj->getNom(), $obj->getDate(), $obj->getCommentaire()));
				$obj->setId(SPDO::getInstance()->LastInsertId());
				return $obj->getId();
			} catch(PDOException $e) {
				die('error create Evenement '.$e->getMessage().'<br>');
			}
		} else
			die('argument de type Evenement requis');
	}

	public static function update($obj) {
		if (get_class($obj) == "Evenement") {
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `evenement` SET `idTypeEvenement`=?,`nom`=?,`date`=?,`commentaire`=? WHERE `idEvenement`=?");
				$req->execute(array($obj->getTypeEvenement()->getId(), $obj->getNom(), $obj->getDate(), $obj->getCommentaire(), $obj->getId()));
			} catch(PDOException $e) {
				die('error update Evenement '.$e->getMessage().'<br>');
			}
		} else {
			die('argument de type Evenement requis');
		}
	}

	public static function delete($obj) {
		if (get_class($obj) == "Evenement") {
			try {
				$req=SPDO::getInstance()->prepare("DELETE FROM `evenement` WHERE `idEvenement`=?");
				$req->execute(array($obj->getId()));
			} catch(PDOException $e) {
				die('error update etablissement '.$e->getMessage().'<br>');
			}
		}else {
			die('argument de type Evenement requis');
		}
	}
}

?>
