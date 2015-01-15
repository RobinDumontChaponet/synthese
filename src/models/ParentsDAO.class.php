<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Parents.class.php");

class ParentsDAO {

	public static function getAll() {
		try {
			$req=SPDO::getInstance()->query("SELECT * FROM `parents`");
			$lst=$req->fetchAll();
			$lstObj=array();
			foreach ($lst as $parents) {
				$lstObj[]=new Parents($parents['idParent'], $parents['adresse1'], $parents['adresse2'], $parents['codePostale'], $parents['ville'], $parents['pays'], $parents['mobile'], $parents['telephone']);
			}
			return $lstObj;
		} catch(PDOException $e) {
			die('error get all parents '.$e->getMessage().'<br>');
		}
	}

	public static function getById($id) {
		if (is_numeric($id)) {
			try {
				$req=SPDO::getInstance()->prepare("SELECT * FROM `parents` WHERE `idParent`=?");
				$req->execute(array($id));
				if ($parents=$req->fetch()) {
					return new Parents($parents['idParent'], $parents['adresse1'], $parents['adresse2'], $parents['codePostale'], $parents['ville'], $parents['pays'], $parents['mobile'], $parents['telephone']);
				} else {
					return null;
				}
			} catch(PDOException $e) {
				die('error get id parents '.$e->getMessage().'<br>');
			}
		}
	}

	public static function create(&$parents) {
		if (get_class($parents)=="Parents") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `parents`(`adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`) VALUES (?,?,?,?,?,?,?)");
				$req->execute(array($parents->getAdresse1(), $parents->getAdresse2(), $parents->getCodePostal(), $parents->getVille(), $parents->getPays(), $parents->getMobile(), $parents->getTelephone()));
				$parents->setId(SPDO::getInstance()->LastInsertId());
				return $parents->getId();
			} catch(PDOException $e) {
				die('error create parents '.$e->getMessage().'<br>');
			}
		} else {
			die('argument de type parents demandé');
		}
	}

	public static function update($parents) {
		if (get_class($parents)=="Parents") {
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `parents` SET `adresse1`=?,`adresse2`=?,`codePostale`=?,`ville`=?,`pays`=?,`mobile`=?,`telephone`=? WHERE `idParent`=?");
				$req->execute(array($parents->getAdresse1(), $parents->getAdresse2(), $parents->getCodePostal(), $parents->getVille(), $parents->getPays(), $parents->getMobile(), $parents->getTelephone(), $parents->getId()));
			} catch(PDOException $e) {
				die('error update parents '.$e->getMessage().'<br>');
			}
		} else {
			die('argument de type parents demandé');
		}
	}

	public static function delete($parents) {
		if (get_class($parents)=="Parents") {
			try{
				$req=SPDO::getInstance()->prepare("DELETE FROM `parents` WHERE `idParent`=?");
				$req->execute(array($parents->getId()));
			} catch(PDOException $e) {
				die('error update parents '.$e->getMessage().'<br>');
			}
		} else {
			die('argument de type parents demandé');
		}
	}

}
?>
