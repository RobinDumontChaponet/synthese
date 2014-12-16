<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."Droit.class.php");

class DroitDAO
{

	public static function getAll()
	{
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT `idDroit`, `libelle` FROM `droits` ORDER BY libelle");
			$lst=$req->fetchAll();
			$lstObj=array();
			foreach
			($lst as $droit)
			{
				$lstObj[]=new Droit($droit['idDroit'], $droit['libelle']);
			}
			return $lstObj;
		}catch(PDOException $e)
		{
			die('error get all droit '.$e.'<br>');
		}
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT `idDroit`, `libelle` FROM `droits` WHERE idDroit=?");
			$req->execute(array($id));
			$droit=$req->fetch();
			return new Droit($droit['idDroit'], $droit['libelle']);
		}catch(PDOException $e)
		{
			die('error get id droit '.$e->getMessage().'<br>');
		}

	}

	public static function create($droit)
	{
		if
		(gettype($droit)=="Droit")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("INSERT INTO `droits`(`libelle`) VALUES (?)");
				$req->execute(array($droit->getLibelle()));
				return $bdd->LastInsertId();
			}catch(PDOException $e)
			{
				die('error create droit '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type droit demandé');
		}
	}

	public static function update($droit)
	{
		if
		(gettype($droit)=="Droit")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("UPDATE `droits` SET `libelle`=? WHERE `idDroit`=?");
				$req->execute(array($droit->getLibelle(), $droit->getId()));
			}catch(PDOException $e)
			{
				die('error update droit '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type droit demandé');
		}
	}

	public static function delete($droit)
	{
		if
		(gettype($droit)=="Droit")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("DELETE FROM `droits` WHERE `idDroit`=?");
				$req->execute(array($droit->getId()));
			}catch(PDOException $e)
			{
				die('error delete droit '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type droit demandé');
		}
	}

}
?>
