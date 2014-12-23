<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Entreprise.class.php");
require_once(MODELS_INC."CodeAPE.class.php");
require_once(MODELS_INC."CodeAPEDAO.class.php");

class EntrepriseDAO
{
	public static function getAll()
	{
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT `idEntreprise`, `codeAPE`, `nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `cedex`, `pays`, `telephone` FROM `entreprise`");
			$results=$req->fetchAll();
			$lstEnt=array();
			foreach ($results as $ent)
			{
				$lstEnt[]=new Entreprise($ent['idEntreprise'], $ent['nom'], $ent['adresse1'], $ent['adresse2'], $ent['codePostal'], $ent['ville'], $ent['cedex'], $ent['pays'], $ent['telephone'], CodeAPEDAO::getByID($ent['codeAPE']));
			}
			return $lstEnt;
		}catch (PDOException $e)
		{
			die("Error get all entreprise !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function getById($id)
	{
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT `idEntreprise`, `codeAPE`, `nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `cedex`, `pays`, `telephone` FROM `entreprise` WHERE idEntreprise=?");
            $req->execute(array($id));
			if($ent=$req->fetch()){
			return new Entreprise($ent['idEntreprise'], $ent['nom'], $ent['adresse1'], $ent['adresse2'], $ent['codePostal'], $ent['ville'], $ent['cedex'], $ent['pays'], $ent['telephone'], CodeAPEDAO::getByID($ent['codeAPE']));
            }else{
                return null;   
            }
		}catch (PDOException $e)
		{
			die("Error get by id entreprise !: " . $e->getMessage() . "<br/>");
		}

	}

	public static function create(&$ent)
	{
		if
		(get_class($ent)=="Entreprise")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("INSERT INTO `entreprise`(`codeAPE`, `nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `cedex`, `pays`, `telephone`) VALUES (?,?,?,?,?,?,?,?,?)");
				$req->execute(array($ent->getCode(), $ent->getNom(), $ent->getAdresse1(), $ent->getAdresse2(), $ent->getCodePostal(), $ent->getVille(), $ent->getCedex(), $ent->getPays(), $ent->getTelephone()));
                $ent->setId($bdd->lastInsertId());
				return $ent->getId();
			}catch (PDOException $e)
			{
				die("Error create entreprise !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('Paramètre de type entreprise requis');
		}
	}

	public static function update($ent)
	{
		if (get_class($ent)=="Entreprise")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("UPDATE `entreprise` SET `codeAPE`=?,`nom`=?,`adresse1`=?,`adresse2`=?,`codePostal`=? ,`ville`=?,`cedex`=?,`pays`=?,`telephone`=? WHERE idEntreprise=?");
				$req->execute(array($ent->getCode(), $ent->getNom(), $ent->getAdresse1(), $ent->getAdresse2(), $ent->getCodePostal(), $ent->getVille(), $ent->getCedex(), $ent->getPays(), $ent->getTelephone(), $ent->getId()));
			}catch (PDOException $e)
			{
				die("Error update entreprise !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('Paramètre de type entreprise requis');
		}
	}

	public static function delete($ent)
	{
		if (get_class($ent)=="Entreprise")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("DELETE FROM `entreprise` WHERE `idEntreprise`=?");
				$req->execute(array($ent->getId()));
			}catch (PDOException $e)
			{
				die("Error delete entreprise !: " . $e->getMessage() . "<br/>");
			}
		}else
		{
			die('Paramètre de type entreprise requis');
		}
	}

}
?>
