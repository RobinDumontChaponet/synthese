<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."TypeSpecialisation.class.php");


class TypeSpecialisationDAO {

	public static function getAll() {
		try{
			$req=SPDO::getInstance()->query("SELECT `idTypeSpe`, `libelle` FROM `typeSpecialisation` ORDER BY libelle");
			while ($type=$req->fetch()) {
				$lstObj[]=new TypeSpecialisation($type['idTypeSpe'], $type['libelle']);
			}
			return $lstObj;
		} catch(PDOException $e) {
			die('error get all specialisation '.$e->getMessage().'<br>');
		}
	}

	public static function getById($id) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT `idTypeSpe`, `libelle` FROM `typeSpecialisation` WHERE idTypeSpe=?");
			$req->execute(array($id));
			if ($type=$req->fetch()) {
				return new TypeSpecialisation($type['idTypeSpe'], $type['libelle']);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error get id spe '.$e->getMessage().'<br>');
		}

	}

	public static function create(&$type) {
		if (gettype($type)=="TypeSpecialisation") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `typeSpecialisation`(`libelle`) VALUES (?)");
				$req->execute(array($type->getLibelle()));
				$type->setId(SPDO::getInstance()->LastInsertId());
				return $type->getId();
			} catch(PDOException $e) {
				die('error create spe '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type spécialisation demandé');
		}
	}

	public static function update($type) {
		if (gettype($type)=="TypeSpecialisation") {
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `typeSpecialisation` SET `libelle`=? WHERE `idTypeSpe`=?");
				$req->execute(array($type->getLibelle(), $type->getId()));
			} catch(PDOException $e) {
				die('error update spe '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type spécialisation demandé');
		}
	}

	public static function delete($type) {
		if (gettype($type)=="TypeSpecialisation") {
			try {
				$req=SPDO::getInstance()->prepare("DELETE FROM `typeSpecialisation` WHERE `idTypeSpe`=?");
				$req->execute(array($type->getId()));
			} catch(PDOException $e) {
				die('error delete spe '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type spécialisation demandé');
		}
	}

}
?>
