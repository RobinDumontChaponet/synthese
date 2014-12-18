<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."DomaineDAO.class.php");
require_once(MODELS_INC."DiplomePostDUT.class.php");

class DiplomePostDUTDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM diplomePostDUT ORDER BY libelle");
			while
			($res=$req->fetch())
			{
				$dom=DomaineDAO::getById($res['idDomaine']);
				$lst[]=new DiplomeDUT($res['idDiplomePost'], $res['libelle'], $dom);
			}
		}catch(PDOException $e)
		{
			die('error getall dip post dut '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM diplomePostDUT WHERE idDiplomePost=?");
			$req->execute(array($id));
			if
			($res=$req->fetch())
			{
				$dom=DomaineDAO::getById($res['idDomaine']);
				return new DiplomeDUT($res['idDiplomePost'], $res['libelle'], $dom);
			}
		}catch(PDOException $e)
		{
			die('error get id dip post dut '.$e->getMessage().'<br>');
			return null;
		}

	}

	public static function create(&$obj)
	{
		if
		(gettype($obj)=="DiplomePostDUT")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `diplomePostDUT`(`idDomaine`, `libelle`) VALUES (?,?)");
				$req->execute(array($obj->getDomaine()->getId(), $obj->getLibelle()));
                $obj->setId($bdd->LastInsertId());
				return $obj->getId();
			}catch(PDOException $e)
			{
				die('error create dip post dut '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type diplome post dut requis');
		}
	}

	public static function update($obj)
	{
		if
		(gettype($obj)=="DiplomePostDUT")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("UPDATE `diplomePostDUT` SET `idDepartement`=?,`libelle`=? WHERE idDiplomeDUT=?");
				$req->execute(array($obj->getDepartement()->getId(), $obj->getLibelle(), $obj->getId()));
			}catch(PDOException $e)
			{
				die('error update dip post dut '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type diplome post dut requis');
		}
	}

	public static function delete($obj)
	{
		if
		(gettype($obj)=="DiplomePostDUT")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `diplomePostDUT` WHERE `idDiplomeDUT`=?");
				$req->execute(array($obj->getId()));
			}catch(PDOException $e)
			{
				die('error update dip post dut '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type diplome post dut requis');
		}
	}

}
?>
