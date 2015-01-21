<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."DepartementIUTDAO.class.php");
require_once(MODELS_INC."DiplomeDUT.class.php");

class DiplomeDUTDAO {

	public static function getAll() {
		$lst=array();
		try{
			$req=SPDO::getInstance()->query("SELECT * FROM diplomeDUT ORDER BY libelle");
			while
			($res=$req->fetch()) {
				$dep=DepartementIUTDAO::getById($res['idDepartement']);
				$lst[]=new DiplomeDUT($res['idDiplomeDUT'], $res['libelle'], $dep);
			}
		}catch(PDOException $e) {
			die('error getall dip dut '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM diplomeDUT WHERE idDiplomeDUT=?");
			$req->execute(array($id));
			if ($res=$req->fetch()) {
				$dep=DepartementIUTDAO::getById($res['idDepartement']);
				return new DiplomeDUT($res['idDiplomeDUT'], $res['libelle'], $dep);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error getall dip dut '.$e->getMessage().'<br>');
			return null;
		}
	}

	public static function getByDepartement($departement) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM diplomeDUT WHERE idDepartement=?");
			$req->execute(array($departement->getId()));
			if ($res=$req->fetch()) {
				return new DiplomeDUT($res['idDiplomeDUT'], $res['libelle'], $departement);
			} else {
				return null;
			}
		} catch(PDOException $e) {
			die('error getall dip dut '.$e->getMessage().'<br>');
			return null;
		}
	}

	public static function getByLibelle($libelle) {
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM diplomeDUT WHERE libelle=?");
			$req->execute(array($libelle));
			if ($res=$req->fetch()) {
				$dep=DepartementIUTDAO::getById($res['idDepartement']);
				return new DiplomeDUT($res['idDiplomeDUT'], $res['libelle'], $dep);
			} else {
				return null;
			}
		}catch(PDOException $e) {
			die('error getall dip dut '.$e->getMessage().'<br>');
			return null;
		}
	}
	
	   public static function getDiplomeDutNotHave($ancien){
        if(get_class($ancien)=="Ancien"){
            try{
                $req = SPDO::getInstance()->prepare("SELECT idDiplomeDUT FROM diplomeDUT WHERE idDiplomeDUT NOT IN (SELECT idDiplomeDUT FROM aEtudie WHERE idPersonne=?)");
                $req->execute(array($ancien->getId()));
                $lst = array();
                while($res = $req->fetch()){
                    $lst[]=DiplomeDUTDAO::getById($res['idDiplomeDUT']);
                }
                return $lst;
            }catch(PDOException $e){
                die('error getDiplomeDutNotHave '.$e->getMessage());
            }
        } else {
            die('paramètre de type ancien getDiplomeDutNotHave');
        }
    }

	public static function create(&$obj) {
		if (get_class($obj) == "DiplomeDUT") {
			try{
				$req=SPDO::getInstance()->prepare("INSERT INTO `diplomeDUT`(`idDepartement`, `libelle`) VALUES (?,?)");
				$req->execute(array($obj->getDepartementIUT()->getId(), $obj->getLibelle()));
				$obj->setId(SPDO::getInstance()->LastInsertId());
				return $obj->getId();
			}catch(PDOException $e) {
				die('error create dip dut '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type diplome dut requis');
		}
	}

	public static function update($obj) {
		if (get_class($obj) == "DiplomeDUT") {
			try{
				$req = SPDO::getInstance()->prepare("UPDATE `diplomeDUT` SET `idDepartement`=?,`libelle`=? WHERE `idDiplomeDUT`=?");
				$req->execute(array($obj->getDepartementIUT()->getId(), $obj->getLibelle(), $obj->getId()));
			}catch(PDOException $e) {
				die('error update dip dut '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type diplome dut requis update');
		}
	}

	public static function delete($obj) {
		if
		(get_class($obj)=="DiplomeDUT") {
			try{
				$req=SPDO::getInstance()->prepare("DELETE FROM `diplomeDUT` WHERE `idDiplomeDUT`=?");
				$req->execute(array($obj->getId()));
			}catch(PDOException $e) {
				die('error update dip dut '.$e->getMessage().'<br>');
			}
		}else {
			die('paramètre de type diplome dut requis');
		}
	}

}
?>
