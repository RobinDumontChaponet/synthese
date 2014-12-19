<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Etablissement.class.php");

class EtablissementDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM etablissement ORDER BY nom");
			while
			($res=$req->fetch())
			{
				$lst[]=new Etablissement($res['idEtablissement'], $res['nom'], $res['adresse1'], $res['adresse2'], $res['codePostal'], $res['ville'], $res['pays']);
			}
		}catch(PDOException $e)
		{
			die('error get all etablissement '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM etablissement WHERE idEtablissement=?");
			$req->execute(array($id));
			if
			($res=$req->fetch())
			{
				return new Etablissement($res['idEtablissement'], $res['nom'], $res['adresse1'], $res['adresse2'], $res['codePostal'], $res['ville'], $res['pays']);
			}
		}catch(PDOException $e)
		{
			die('error get id etablissement '.$e->getMessage().'<br>');
		}
	}

	public static function create(&$obj)
	{
		if
		(get_class($obj)=="Etablissement")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `etablissement`(`nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`) VALUES (?,?,?,?,?,?)");
				$req->execute(array($obj->getNom(), $obj->getAdresse1(), $obj->getAdresse2(), $obj->getCodePostal(), $obj->getVille(), $obj->getPays()));
				$obj->setId($bdd->LastInsertId());
                return $obj->getId();
			}catch(PDOException $e)
			{
				die('error create etablissement '.$e->getMessage().'<br>');
			}
		}else
		{
			die('argument de type etablissement requis');
		}
	}

	public static function update($obj)
	{
		if
		(get_class($obj)=="Etablissement")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("UPDATE `etablissement` SET `nom`=?,`adresse1`=?,`adresse2`=?,`codePostal`=?,`ville`=?,`pays`=? WHERE `idEtablissement`=?");
				$req->execute(array($obj->getNom(), $obj->getAdresse1(), $obj->getAdresse2(), $obj->getCodePostal(), $obj->getVille(), $obj->getPays(), $obj->getId()));
			}catch(PDOException $e)
			{
				die('error update etablissement '.$e->getMessage().'<br>');
			}
		}else
		{
			die('argument de type etablissement requis');
		}
	}

	public static function delete($obj)
	{
		if
		(get_class($obj)=="Etablissement")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `etablissement` WHERE `idEtablissement`=?");
				$req->execute(array($obj->getId()));
			}catch(PDOException $e)
			{
				die('error update etablissement '.$e->getMessage().'<br>');
			}
		}else
		{
			die('argument de type etablissement requis');
		}
	}
}

?>
