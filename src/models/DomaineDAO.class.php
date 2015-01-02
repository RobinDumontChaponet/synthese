<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."Domaine.class.php");

class DomaineDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$req=SPDO::getInstance()->query("SELECT * FROM domaine ORDER BY libelle");
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
			$req=SPDO::getInstance()->prepare("SELECT * FROM domaine WHERE idDomaine=?");
            $req->execute(array($id));
			if($res=$req->fetch()){
			 return new Domaine($res['idDomaine'], $res['libelle'], $res['description']);
            }else{
                return null;
            }
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
				$req=SPDO::getInstance()->prepare("INSERT INTO `domaine`(`idDomaine`, `libelle`, `description`) VALUES (?,?,?)");
				$req->execute(array($obj->getId(), $obj->getLibelle(), $obj->getDescription()));
                $obj->setId(SPDO::getInstance()->LastInsertId());
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
				$req=SPDO::getInstance()->prepare("UPDATE `domaine` SET `libelle`=?,`description`=? WHERE `idDomaine`=?");
				$req->execute(array($obj->getLibelle(), $obj->getDescription(), $obj->getId()));
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
				$req=SPDO::getInstance()->prepare("DELETE FROM `domaine` WHERE `idDomaine`=?");
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
