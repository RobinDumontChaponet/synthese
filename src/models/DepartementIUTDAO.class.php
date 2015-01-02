<?php

require_once('dbConnection.inc.php');
require_once(MODELS_INC.'DepartementIUT.class.php');

class DepartementIUTDAO {
	public static function getAll() {
		$lst=array();
		try {
			$req=SPDO::getInstance()->query("SELECT * FROM departementIUT ORDER BY nom");
			while ($res=$req->fetch()) {
				$lst[]=new DepartementIUT($res['idDepartement'], $res['nom'], $res['sigle']);
			}
		} catch (PDOException $e) {
			die("Error getall dpt() !: " . $e->getMessage() . "<br/>");
		}
		return $lst;
	}

	public static function getById($id) {
		$dpt=null;
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM departementIUT WHERE idDepartement=?");
			$req->execute(array($id));
			if ($res=$req->fetch()) {
				$dpt=new DepartementIUT($res['idDepartement'], $res['nom'], $res['sigle']);
			}
		} catch (PDOException $e) {
			die("Error get by id dpt() !: " . $e->getMessage() . "<br/>");
		}
		return $dpt;
	}

	public static function create(&$obj) {
		if (get_class($obj)=="DepartementIUT") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `departementIUT`(`nom`, `sigle`) VALUES (?, ?)");
				$req->execute(array($obj->getNom(), $obj->getSigle()));
				$obj->setId(SPDO::getInstance()->lastInsertId());
				return $obj->getId();
			} catch(PDOException $e) {
				die("Error create dpt() !: " . $e->getMessage() . "<br/>");
			}
		}
	}

	public static function update($dpt) {
		try {
			$req=SPDO::getInstance()->prepare("UPDATE `departementIUT` SET `nom`=?, `sigle`=? WHERE `idDepartement`=?");
			$req->execute(array($dpt->getNom(), $dpt->getSigle(), $dpt->getId()));
		} catch (PDOException $e) {
			die("Error update dpt() !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function delete($dpt) {
		try {
			$req=SPDO::getInstance()->prepare("DELETE FROM `departementIUT` WHERE `idDepartement`=?");
			$req->execute(array($dpt->getId()));
		} catch (PDOException $e) {
			die("Error delete dpt() !: " . $e->getMessage() . "<br/>");
		}
	}
}
?>
