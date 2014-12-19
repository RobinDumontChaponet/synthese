<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."CodeAPE.class.php");

class CodeAPEDAO
{

	public static function getAll()
	{
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT `code`, `libelle` FROM `codeAPE` ORDER BY code");
			$lst=$req->fetchAll();
			$lstcode=array();
			foreach
			($lst as $code)
			{
				$lstcode[]=new CodeAPE($code['code'], $code['libelle']);
			}
			return $lstcode;
		}catch (PDOException $e)
		{
			die("Error get all code ape !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT `code`, `libelle` FROM `codeAPE` WHERE code=?");
			$req->execute(array($id));
			$code=$req->fetch();
			return new CodeAPE($code['code'], $code['libelle']);
		}catch (PDOException $e)
		{
			die("Error get id code ape !: " . $e->getMessage() . "<br/>");
		}

	}

	public static function create(&$code)
	{
		if (get_class($code)=="CodeAPE")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("INSERT INTO `codeAPE`(`code`, `libelle`) VALUES (?,?)");
				$req->execute(array($code->getCode(), $code->getLibelle()));
                $code->setId($bdd->LastInsertId());
				return $code->getId();
			}catch (PDOException $e)
			{
				die("Error create code ape !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('Paramètre de type code ape requis');
		}
	}

	public static function update($code)
	{
		if (get_class($code)=="CodeAPE")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("UPDATE `codeAPE` SET `libelle`=? WHERE code=?");
				$req->execute(array($code->getLibelle(), $code->getCode()));
			}catch (PDOException $e)
			{
				die("Error update code ape !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('Paramètre de type code ape requis');
		}
	}

	public static function delete($code)
	{
		if (get_class($code)=="CodeAPE")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("DELETE FROM `codeAPE` WHERE `code`=?");
				$req->execute(array($code->getCode()));
			}catch (PDOException $e)
			{
				die("Error delete code ape !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('Paramètre de type code ape requis');
		}
	}

}
?>
