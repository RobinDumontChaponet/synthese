<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Travaille.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."PosteDAO.class.php");
require_once(MODELS_INC."EntrepriseDAO.class.php");

class TravailleDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM travaille");
			while
			($res=$req->fetch())
			{
				$ancien=AncienDAO::getById($res['idPersonne']);
				$poste=PosteDAO::getById($res['idPoste']);
				$ent=EntrepriseDAO::getById($res['idEntreprise']);
				$lst[]=new Travaille($ent, $poste, $ancien, $res['dateEmbaucheDeb'], $res['dateEmbaucheFin']);
			}
		}catch(PDOException $e)
		{
			die('error getall Travaille '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getByAncien($id)
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM travaille WHERE idPersonne=?");
			$req->execute(array($id));
			while
			($res=$req->fetch())
			{
				$ancien=AncienDAO::getById($res['idPersonne']);
				$poste=PosteDAO::getById($res['idPoste']);
				$ent=EntrepriseDAO::getById($res['idEntreprise']);
				$lst[]=new Travaille($ent, $poste, $ancien, $res['dateEmbaucheDeb'], $res['dateEmbaucheFin']);
			}
		}catch(PDOException $e)
		{
			die('error getByAncien Travaille '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function create($obj)
	{
		if
		(gettype($obj)=="Travaille")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `travaille`(`idPersonne`, `idPoste`, `idEntreprise`, `dateEmbaucheDeb`, `dateEmbaucheFin`) VALUES (?,?,?,?,?)");
				$req->execute(array($obj->getAncien()->getId(), $obj->getPoste()->getId(), $obj->getEntreprise()->getId(), $obj->getDateEmbaucheDebut(), $obj->getDateEmbaucheFin()));
			}catch(PDOException $e)
			{
				die('error create Travaille '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type Travaille requis');
		}
	}

	public static function update($obj)
	{
		if
		(gettype($obj)=="Travaille")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("UPDATE `travaille` SET `dateEmbaucheFin`=? WHERE `idPersonne`=?,`idPoste`=?,`idEntreprise`=?,`dateEmbaucheDeb`=?");
				$req->execute(array($obj->getDateEmbaucheFin(), $obj->getAncien()->getId(), $obj->getPoste()->getId(), $obj->getEntreprise()->getId(), $obj->getDateEmbaucheDebut()));
			}catch(PDOException $e)
			{
				die('error update Travaille '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type Travaille requis');
		}
	}

	public static function delete($obj)
	{
		if
		(gettype($obj)=="Travaille")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `travaille` WHERE `idPersonne`=?,`idPoste`=?,`idEntreprise`=?,`dateEmbaucheDeb`=?");
				$req->execute(array($obj->getAncien()->getId(), $obj->getPoste()->getId(), $obj->getEntreprise()->getId(), $obj->getDateEmbaucheDebut()));
			}catch(PDOException $e)
			{
				die('error delete Travaille '.$e->getMessage().'<br>');
			}
		}else
		{
			die('paramètre de type Travaille requis');
		}
	}

}
?>
