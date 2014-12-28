<?php

require_once('dbConnection.inc.php');
require_once(MODELS_INC.'DepartementIUT.class.php');

class DepartementIUTDAO {
	public static function getAll() {
		$lst=array();
		try {
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM departementIUT ORDER BY nom");
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
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM departementIUT WHERE idDepartement=?");
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
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `departementIUT`(`nom`, `sigle`) VALUES (?, ?)");
				$req->execute(array($obj->getNom(), $obj->getSigle()));
				$obj->setId($bdd->lastInsertId());
				return $obj->getId();
			} catch(PDOException $e) {
				die("Error create dpt() !: " . $e->getMessage() . "<br/>");
			}
		}
	}

	public static function update($dpt) {
		try {
			$bdd=connect();
			$req=$bdd->prepare("UPDATE `departementIUT` SET `nom`=?, `sigle`=? WHERE `idDepartement`=?");
			$req->execute(array($dpt->getNom(), $dpt->getSigle(), $dpt->getId()));
		} catch (PDOException $e) {
			die("Error update dpt() !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function delete($dpt) {
		try {
			$bdd=connect();
			$req=$bdd->prepare("DELETE FROM `departementIUT` WHERE `idDepartement`=?");
			$req->execute(array($dpt->getId()));
		} catch (PDOException $e) {
			die("Error delete dpt() !: " . $e->getMessage() . "<br/>");
		}
	}
}
?>
