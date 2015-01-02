<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Specialisation.class.php");
require_once(MODELS_INC."TypeSpecialisationDAO.class.php");

class SpecialisationDAO {

	public static function getAll() {
		try{
			$req=SPDO::getInstance()->query("SELECT `idSpe`, `libelle`, `idTypeSpe` FROM `specialisation` ORDER BY libelle");
			$lst=$req->fetchAll();
			$lstObj=array();
			foreach ($lst as $spe) {
				$lstObj[]=new Specialisation($spe['idSpe'], $spe['libelle'], TypeSpecialisationDAO::getById($spe['idTypeSpe']));
			}
			return $lstObj;
		}catch(PDOException $e) {
			die('error get all spé '.$e->getMessage().'<br>');
		}
	}

	public static function getById($id) {
		try{
			$req=SPDO::getInstance()->prepare("SELECT `idSpe`, `libelle`, `idTypeSpe` FROM `specialisation` WHERE idSpe=?");
			$req->execute(array($id));
			$spe=$req->fetch();
			return new Specialisation($spe['idSpe'], $spe['libelle'], TypeSpecialisationDAO::getById($spe['idTypeSpe']));
		} catch(PDOException $e) {
			die('error get id spé '.$e->getMessage().'<br>');
		}

	}

	public static function create(&$spe) {
		if (gettype($spe)=="Specialisation") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `specialisation`(`libelle`, `idTypeSpe`) VALUES (?,?)");
				$req->execute(array($spe->getLibelle(), $spe->getTypeSpecialisation()->getId()));
				$spe->setId(SPDO::getInstance()->LastInsertId());
				return $spe->getId();
			} catch(PDOException $e) {
				die('error create spé '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type specialisation demandé');
		}
	}

	public static function update($spe) {
		if
		(gettype($spe)=="Specialisation") {
			try{
				$req=SPDO::getInstance()->prepare("UPDATE `specialisation` SET `libelle`=?,`idTypeSpe`=? WHERE `idSpe`=?");
				$req->execute(array($spe->getLibelle(), $spe->getTypeSpecialisation()->getId(), $spe->getId()));
			}catch(PDOException $e) {
				die('error update spé '.$e->getMessage().'<br>');
			}
		}else {
			die('paramètre de type specialisation demandé');
		}
	}

	public static function delete($spe) {
		if
		(gettype($spe)=="Specialisation") {
			try{
				$req=SPDO::getInstance()->prepare("DELETE FROM `specialisation` WHERE `idSpe`=?");
				$req->execute(array($spe->getId()));
			}catch(PDOException $e) {
				die('error delete spé '.$e->getMessage().'<br>');
			}
		}else {
			die('paramètre de type specialisation demandé');
		}
	}

}
?>
