<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."DepartementIUTDAO.class.php");
require_once(MODELS_INC."DiplomeDUT.class.php");

class DiplomeDUTDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM diplomeDUT ORDER BY libelle");
			while
			($res=$req->fetch())
			{
				$dep=DepartementIUTDAO::getById($res['idDepartement']);
				$lst[]=new DiplomeDUT($res['idDiplomeDUT'], $res['libelle'], $dep);
			}
		}catch(PDOException $e)
		{
			die('error getall dip dut '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM diplomeDUT WHERE idDiplomeDUT=?");
			$req->execute(array($id));
			if
			($res=$req->fetch())
			{
				$dep=DepartementIUTDAO::getById($res['idDepartement']);
				return new DiplomeDUT($res['idDiplomeDUT'], $res['libelle'], $dep);
			}
		}catch(PDOException $e)
		{
			die('error getall dip dut '.$e->getMessage().'<br>');
			return null;
		}

	}

	public static function create(&$obj) {
		if (get_class($obj) == "DiplomeDUT") {
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `diplomeDUT`(`idDepartement`, `libelle`) VALUES (?,?)");
				$req->execute(array($obj->getDepartementIUT()->getId(), $obj->getLibelle()));
                $obj->setId($bdd->LastInsertId());
				return $obj->getId();
			}catch(PDOException $e)
			{
				die('error create dip dut '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type diplome dut requis');
		}
	}

	public static function update($obj) {
		if (get_class($obj) == "DiplomeDUT") {
			try{
				$bdd=connect();
				$req = $bdd->prepare("UPDATE `diplomeDUT` SET `idDepartement`=?,`libelle`=? WHERE `idDiplomeDUT`=?");
				$req->execute(array($obj->getDepartementIUT()->getId(), $obj->getLibelle(), $obj->getId()));
			}catch(PDOException $e)
			{
				die('error update dip dut '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type diplome dut requis update');
		}
	}

	public static function delete($obj)
	{
		if
		(get_class($obj)=="DiplomeDUT")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `diplomeDUT` WHERE `idDiplomeDUT`=?");
				$req->execute(array($obj->getId()));
			}catch(PDOException $e)
			{
				die('error update dip dut '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type diplome dut requis');
		}
	}

}
?>
