<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."AEtudie.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."DiplomeDUTDAO.class.php");
require_once(MODELS_INC."PromotionDAO.class.php");
require_once(MODELS_INC."DepartementIUTDAO.class.php");

class AEtudieDAO
{

	public static function getAll()
	{
		try{
			$lst=array();
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM aEtudie");
			while
			($result=$req->fetch())
			{
				$promo=PromotionDAO::getById($result['idPromo']);
				$dpt=DepartementIUTDAO::getById($result['idDepartement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$dip=DiplomeDUTDAO::getById($result['idDiplomeDUT']);
				$lst[]=new AEtudie($pers, $dip, $dpt, $promo);
			}
			return $lst;
		}catch(PDOException $e)
		{
			die('error getAll a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getByAncien($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM aEtudie WHERE idPersonne=?");
			$req->execute(array($id));
			$result=$req->fetch();
			if
			($result!=null)
			{
				$promo=PromotionDAO::getById($result['idPromo']);
				$dpt=DepartementIUTDAO::getById($result['idDepartement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$dip=DiplomeDUTDAO::getById($result['idDiplomeDUT']);
				return new AEtudie($pers, $dip, $dpt, $promo);
			}else
			{
				return null;
			}
		}catch(PDOException $e)
		{
			die('error getById a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function create($obj)
	{
		if
		(gettype($obj)=="AEtudie")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `aEtudie`(`idPromo`, `idDerpartement`, `idPersonne`, `idDiplomeDUT`) VALUES (?,?,?,?)");
				$req->execute(array($obj->getPromo()->getId(), $obj->getDepartement()->getId(), $obj->getPersonne()->getId(), $obj->getDiplomeDUT()->getId()));
			}catch(PDOException $e)
			{
				die('error create aetudie '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type AEtudie requis');
		}
	}

	public static function delete($obj)
	{
		if
		(gettype($obj)=="AEtudie")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `aEtudie` WHERE `idPromo`=? AND `idDerpartement`=? AND `idPersonne`=? AND `idDiplomeDUT`=?");
				$req->execute(array($obj->getPromo()->getId(), $obj->getDepartement()->getId(), $obj->getPersonne()->getId(), $obj->getDiplomeDUT()->getId()));
			}catch(PDOException $e)
			{
				die('error delete aetudie '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type AEtudie requis');
		}
	}

}
?>
