<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."Groupe.class.php");
require_once(MODELS_INC."GroupeDAO.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");
require_once(MODELS_INC."AppartientGroupe.class.php");

class AppartientGroupeDAO {

	public static function getByIdGroupe($id) {
		$groupe=GroupeDAO::getById($id);
		return AppartientGroupeDAO::getByGroupe($groupe);
	}

	public static function getByGroupe($groupe) {
		if (get_class($groupe)=="Groupe") {
			try {
				$req=SPDO::getInstance()->prepare("SELECT * FROM `appartientGroupe` WHERE idGroupe=?");
				$req->execute(array($groupe->getId()));
				$lst=array();
				while ($res=$req->fetch()) {
					$lst[]=PersonneDAO::getById($res['idPersonne']);
				}
				return new AppartientGroupe($groupe, $lst);
			} catch(PDOException $e) {
				die('error sql getByIdGroupe appartientgroupedao');
			}
		} else {
			die('erreur type param getbygroupe appartientGroupeDAO');
		}
	}

	public static function getByGroupeAndPers($groupe, $pers) {
		if (get_class($groupe)=="Groupe" && get_class($pers)=="Personne") {
			try {
				$req=SPDO::getInstance()->prepare("SELECT * FROM `appartientGroupe` WHERE idGroupe=? AND idPersonne=?");
				$req->execute(array($groupe->getId(), $pers->getId()));
				if ($res=$req->fetch()) {
					return new AppartientGroupe($groupe, array($pers));
				} else {
					return null;
				}
			} catch(PDOException $e) {
				die('error sql getByIdGroupe appartientgroupedao');
			}
		} else {
			die('erreur type param getbygroupe appartientGroupeDAO');
		}
	}

	public static function create($app) {
		if (get_class($app)=="AppartientGroupe") {
			$groupe=$app->getGroupe();
			foreach ($app->getMembres() as $pers) {
				$exist=AppartientGroupeDAO::getByGroupeAndPers($groupe, $pers);
				if ($exist==null) {
					AppartientGroupeDAO::ajoutePers($groupe, $pers);
				}
			}
		} else {
			die('erreur type param create appartientGroupeDAO');
		}
	}

	public static function ajoutePers($groupe, $pers) {
		if (get_class($groupe)=="Groupe" && get_class($pers)=="Personne") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `appartientGroupe`(`idGroupe`, `idPersonne`) VALUES (?,?)");
				$req->execute(array($groupe->getId(), $pers->getId()));
			} catch(PDOException $e) {
				die('error sql ajoutePers appartientgroupedao');
			}
		} else {
			die('erreur type param ajoutePers appartientGroupeDAO');
		}
	}

}
?>
