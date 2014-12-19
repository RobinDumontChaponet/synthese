<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."Domaine.class.php");

class DomaineDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM domaine ORDER BY libelle");
			while
			($res=$req->fetch())
			{
				$lst[]=new Domaine($res['idDomaine'], $res['libelle'], $res['description']);
			}
		}catch(PDOException $e)
		{
			die('error getAll domaine '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM domaine WHERE idDomaine=?");
			$res=$req->fetch();
			return new Domaine($res['idDomaine'], $res['libelle'], $res['description']);
		}catch(PDOException $e)
		{
			die('error getbyid domaine '.$e->getMessage().'<br>');
		}
	}

	public static function create(&$obj)
	{
		if
		(get_class($obj)=="Domaine")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `domaine`(`idDomaine`, `libelle`, `description`) VALUES (?,?,?)");
				$req->execute(array($obj->getId(), $obj->getLibelle(), $obj->getDescription()));
                $obj->setId($bdd->LastInsertId());
				return $obj->getId();
			}catch(PDOException $e)
			{
				die('error create domaine '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type domaine requis');
		}
	}

	public static function update($obj)
	{
		if
		(get_class($obj)=="Domaine")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("UPDATE `domaine` SET `libelle`=?,`description`=? WHERE `idDomaine`=?");
				$req->execute(array($obj->getLibelle(), $obj->getDescription(), $obj->getId()));
				return $bdd->LastInsertId();
			}catch(PDOException $e)
			{
				die('error update domaine '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type domaine requis');
		}
	}

	public static function delete($obj)
	{
		if
		(get_class($obj)=="Domaine")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `domaine` WHERE `idDomaine`=?");
				$req->execute(array($obj->getId()));
			}catch(PDOException $e)
			{
				die('error delete domaine '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type domaine requis');
		}
	}
}
?>
