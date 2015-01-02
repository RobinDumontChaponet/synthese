<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Etablissement.class.php");

class EtablissementDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$req=SPDO::getInstance()->query("SELECT * FROM etablissement ORDER BY nom");
			while
			($res=$req->fetch())
			{
				$lst[]=new Etablissement($res['idEtablissement'], $res['nom'], $res['adresse1'], $res['adresse2'], $res['codePostal'], $res['ville'], $res['pays'],$res['fax'],$res['web']);
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
			$req=SPDO::getInstance()->prepare("SELECT * FROM etablissement WHERE idEtablissement=?");
			$req->execute(array($id));
			if
			($res=$req->fetch())
			{
				return new Etablissement($res['idEtablissement'], $res['nom'], $res['adresse1'], $res['adresse2'], $res['codePostal'], $res['ville'], $res['pays'],$res['fax'],$res['web']);
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
				$req=SPDO::getInstance()->prepare("INSERT INTO `etablissement`(`nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`,`fax`,`web`) VALUES (?,?,?,?,?,?,?,?)");
				$req->execute(array($obj->getNom(), $obj->getAdresse1(), $obj->getAdresse2(), $obj->getCodePostal(), $obj->getVille(), $obj->getPays(),$obj->getFax(),$obj->getWeb()));
				$obj->setId(SPDO::getInstance()->lastInsertId());
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
				$req=SPDO::getInstance()->prepare("UPDATE `etablissement` SET `nom`=?,`adresse1`=?,`adresse2`=?,`codePostal`=?,`ville`=?,`pays`=?,`fax`=?,`web`=? WHERE `idEtablissement`=?");
				$req->execute(array($obj->getNom(), $obj->getAdresse1(), $obj->getAdresse2(), $obj->getCodePostal(), $obj->getVille(), $obj->getPays(),$obj->getFax(),$obj->getWeb(), $obj->getId()));
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
				$req=SPDO::getInstance()->prepare("DELETE FROM `etablissement` WHERE `idEtablissement`=?");
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
