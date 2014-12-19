<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."TypeProfil.class.php");

class TypeProfilDAO
{

	public static function getAll()
	{
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT `idProfil`, `libelle` FROM `typeProfil` ORDER BY libelle");
			$lst=$req->fetchAll();
			$lstposte=array();
			foreach
			($lst as $poste)
			{
				$lstposte[]=new TypeProfil($poste['idProfil'], $poste['libelle']);
			}
			return $lstposte;
		}catch (PDOException $e)
		{
			die("Error get all TypeProfil !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT `idProfil`, `libelle` FROM `typeProfil` WHERE idProfil=?");
			$req->execute(array($id));
			if
			($poste=$req->fetch())
			{
				return new TypeProfil($poste['idProfil'], $poste['libelle']);
			}else
			{
				return null;
			}
		}catch (PDOException $e)
		{
			die("Error get id TypeProfil !: " . $e->getMessage() . "<br/>");
		}

	}

	public static function create(&$poste)
	{
		if
		(get_class($poste)=="TypeProfil")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("INSERT INTO `typeProfil`(`libelle`) VALUES (?)");
				$req->execute(array($poste->getLibelle()));
				$poste->setId($bdd->LastInsertId());
                return $poste->getId();
			}catch (PDOException $e)
			{
				die("Error create TypeProfil !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('argument de type TypeProfil demandé');
		}
	}

	public static function update($poste)
	{
		if
		(get_class($poste)=="TypeProfil")
		{
			$bdd->connect();
			$req=$bdd->prepare("UPDATE `typeProfil` SET `libelle`=? WHERE `idProfil`=?");
			$req->execute(array($poste->getLibelle(), $poste->getId()));
		}
	}

	public static function delete($poste)
	{
		if
		(get_class($poste)=="TypeProfil")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("DELETE FROM `typeProfil` WHERE `idProfil`=?");
				$req->execute(array($poste->getId()));
			}catch (PDOException $e)
			{
				die("Error delete TypeProfil !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('argument de type TypeProfil demandé');
		}
	}

}
?>
