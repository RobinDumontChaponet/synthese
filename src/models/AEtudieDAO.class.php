<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."AEtudie.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."DiplomeDUTDAO.class.php");
require_once(MODELS_INC."PromotionDAO.class.php");
require_once(MODELS_INC."DepartementIUTDAO.class.php");

class AEtudieDAO {

	public static function getAll() {
		try {
			$lst=array();
			$req=SPDO::getInstance()->query("SELECT * FROM aEtudie");
			while ($result = $req->fetch()) {
				$promo=PromotionDAO::getById($result['idPromo']);
				$dpt=DepartementIUTDAO::getById($result['idDepartement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$dip=DiplomeDUTDAO::getById($result['idDiplomeDUT']);
				$lst[]=new AEtudie($pers, $dip, $dpt, $promo);
			}
			return $lst;
		} catch(PDOException $e) {
			die('error getAll a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getByAncien($ancien) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM aEtudie WHERE idPersonne=?");
			$req->execute(array($ancien->getId()));
			while ($result = $req->fetch()) {
				$promo = PromotionDAO::getById($result['idPromo']);
				$dpt = DepartementIUTDAO::getById($result['idDepartement']);
				$pers = AncienDAO::getById($result['idPersonne']);
				$dip = DiplomeDUTDAO::getById($result['idDiplomeDUT']);
				$lst[] = new AEtudie($pers, $dip, $dpt, $promo);
			}
			return $lst;
		} catch(PDOException $e) {
			die('error getById a etudie '.$e->getMessage().'<br>');
		}
	}
	
	public static function getPromotionByAncien($ancien) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT idPromo FROM aEtudie WHERE idPersonne=?");
			$req->execute(array($ancien->getId()));
			$result=$req->fetch();
			if ($result != NULL) {
				$promotion = PromotionDAO::getById($result['idPromo']);
				return $promotion;
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('Error getPromotionByAncien AEtudieDAO : '.$e->getMessage().'<br>');
		}
	}

	public static function getByDiplomeDUT($diplome) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM aEtudie WHERE idDiplomeDUT=?");
			$req->execute(array($diplome->getId()));
			$result=$req->fetch();
			if ($result!=null) {
				$promo=PromotionDAO::getById($result['idPromo']);
				$dpt=DepartementIUTDAO::getById($result['idDepartement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				return new AEtudie($pers, $diplome, $dpt, $promo);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error getById a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getByDepartementIUT($departement) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM aEtudie WHERE idDepartement=?");
			$req->execute(array($departement->getId()));
			$result=$req->fetch();
			if ($result!=null) {
				$promo=PromotionDAO::getById($result['idPromo']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$dip=DiplomeDUTDAO::getById($result['idDiplomeDUT']);
				return new AEtudie($pers, $dip, $departement, $promo);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error getById a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getByPromotion($promotion) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM aEtudie WHERE idPromo=?");
			$req->execute(array($promotion->getId()));
			$result=$req->fetch();
			if ($result!=null) {
				$dpt=DepartementIUTDAO::getById($result['idDepartement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$dip=DiplomeDUTDAO::getById($result['idDiplomeDUT']);
				return new AEtudie($pers, $dip, $dpt, $promotion);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error getById a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function create($obj) {
		if (get_class($obj)=="AEtudie") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `aEtudie`(`idPromo`, `idDepartement`, `idPersonne`, `idDiplomeDUT`) VALUES (?,?,?,?)");
				$req->execute(array($obj->getPromotion()->getId(), $obj->getDepartementIUT()->getId(), $obj->getAncien()->getId(), $obj->getDiplomeDUT()->getId()));
			} catch(PDOException $e) {
				die('error create aetudie '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type AEtudie requis');
		}
	}

	public static function delete($obj) {
		if (get_class($obj) == "AEtudie") {
			try {
				$req=SPDO::getInstance()->prepare("DELETE FROM `aEtudie` WHERE `idPromo`=? AND `idDepartement`=? AND `idPersonne`=? AND `idDiplomeDUT`=?");
				$req->execute(array($obj->getPromotion()->getId(), $obj->getDepartementIUT()->getId(), $obj->getAncien()->getId(), $obj->getDiplomeDUT()->getId()));
			} catch(PDOException $e) {
				die('error delete aetudie '.$e->getMessage().'<br>');
			}
		} else {
			die('AEtudieDAO delete : Paramètre de type AEtudie requis');
		}
	}

	public static function update($ex, $new) {
		if (get_class($ex) == "AEtudie" && get_class($new) == "AEtudie") {
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `aEtudie` SET `idPromo`=?, `idDepartement`=?, `idPersonne`=?, `idDiplomeDUT`=? WHERE `idPromo`=? AND `idDepartement`=? AND `idPersonne`=? AND `idDiplomeDUT`=? ");
				$req->execute(array($new->getPromotion()->getId(), $new->getDepartementIUT()->getId(), $new->getAncien()->getId(), $new->getDiplomeDUT()->getId(), $ex->getPromotion()->getId(), $ex->getDepartementIUT()->getId(), $ex->getAncien()->getId(), $ex->getDiplomeDUT()->getId(),));
			} catch(PDOException $e) {
				die('error delete aetudie '.$e->getMessage().'<br>');
			}
		} else {
			die('AEtudieDAO delete : Paramètre de type AEtudie requis');
		}
	}
}
?>
