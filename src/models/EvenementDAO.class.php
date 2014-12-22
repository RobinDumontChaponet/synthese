<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Evenement.class.php");
require_once(MODELS_INC."TypeEvenementDAO.class.php");

class EvenementDAO
{

	public static function getAll() {
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM evenement");
			while
			($res=$req->fetch())
			{
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Evenement($res['idEvenement'], $type,$res['date'],$res['commentaire']);
			}
		}catch(PDOException $e)
		{
			die('error get all Evenement '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getById($id) {
		try{
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM evenement WHERE idEvenement=?");
			$req->execute(array($id));
			if
			($res=$req->fetch())
			{
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				return new Evenement($res['idEvenement'], $type,$res['date'],$res['commentaire']);
			}
		}catch(PDOException $e)
		{
			die('error get id Evenement '.$e->getMessage().'<br>');
		}
	}

    public static function getEvenementAnterieur(){
        $lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM evenement  WHERE date<now() ORDER BY date DESC");
			while
			($res=$req->fetch())
			{
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Evenement($res['idEvenement'], $type,$res['date'],$res['commentaire']);
			}
		}catch(PDOException $e)
		{
			die('error get all Evenement '.$e->getMessage().'<br>');
		}
		return $lst;
    }

    public static function getEvenementPosterieur(){
        $lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM evenement  WHERE date>now()");
			while
			($res=$req->fetch())
			{
				$type=TypeEvenementDAO::getById($res['idTypeEvenement']);
				$lst[]=new Evenement($res['idEvenement'], $type,$res['date'],$res['commentaire']);
			}
		}catch(PDOException $e)
		{
			die('error get all Evenement '.$e->getMessage().'<br>');
		}
		return $lst;
    }

	public static function create(&$obj)
	{
		if
		(get_class($obj)=="Evenement")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `evenement`(`idTypeEvenement`,`date`,`commentaire`) VALUES (?,?,?)");
				$req->execute(array($obj->getTypeEvenement()->getId(),$obj->getDate(),$obj->getCommentaire()));
				$obj->setId($bdd->LastInsertId());
                return $obj->getId();
			}catch(PDOException $e)
			{
				die('error create Evenement '.$e->getMessage().'<br>');
			}
		}else
		{
			die('argument de type Evenement requis');
		}
	}

	public static function update($obj)
	{
		if
		(get_class($obj)=="Evenement")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("UPDATE `evenement` SET `idTypeEvenement`=?,`date`=?,`commentaire`=? WHERE `idEvenement`=?");
				$req->execute(array($obj->get_classEvenement()->getId(),$obj->getDate(),$obj->getCommentaire(), $obj->getId()));
			}catch(PDOException $e)
			{
				die('error update Evenement '.$e->getMessage().'<br>');
			}
		}else
		{
			die('argument de type Evenement requis');
		}
	}

	public static function delete($obj)
	{
		if
		(get_class($obj)=="Evenement")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `evenement` WHERE `idEvenement`=?");
				$req->execute(array($obj->getId()));
			}catch(PDOException $e)
			{
				die('error update etablissement '.$e->getMessage().'<br>');
			}
		}else
		{
			die('argument de type Evenement requis');
		}
	}
}

?>
