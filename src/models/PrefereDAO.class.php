<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Prefere.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."TypeEvenementDAO.class.php");

class PrefereDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM prefere");
			while
			($res=$req->fetch())
			{
				$ancien=AncienDAO::getById($res['idPersonne']);
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Prefere($ancien, $type);
			}
		}catch(PDOException $e)
		{
			die('error getall Prefere '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getByAncien($id)
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM prefere WHERE idPersonne=?");
			$req->execute(array($id));
			while
			($res=$req->fetch())
			{
				$ancien=AncienDAO::getById($res['idPersonne']);
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Prefere($ancien, $type);
			}
		}catch(PDOException $e)
		{
			die('error getByAncien Prefere '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function create($obj)
	{
		if
		(gettype($obj)=="Prefere")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `prefere`(`idPersonne`, `idTypeEvenement`) VALUES (?,?)");
				$req->execute(array($obj->getAncien()->getId(), $obj->getTypeEvenement()->getId()));
			}catch(PDOException $e)
			{
				die('error create Prefere '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type Prefere requis');
		}
	}


	public static function delete($obj)
	{
		if
		(gettype($obj)=="Prefere")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `prefere` WHERE `idPersonne`=?,`idTypeEvenement`=?");
				$req->execute(array($obj->getAncien()->getId(), $obj->getTypeEvenement()->getId()));
			}catch(PDOException $e)
			{
				die('error delete Prefere '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type Prefere requis');
		}
	}

}
?>
