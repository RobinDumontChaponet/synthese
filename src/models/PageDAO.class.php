<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Page.class.php");

class PageDAO
{
	public static function getAll()
	{
		try {
			$req=SPDO::getInstance()->query("SELECT * FROM `page` ORDER BY libelle");
			$lst=$req->fetchAll();
			$lstObj=array();
			foreach ($lst as $page)
			{
				$lstObj[]=new Page($page['idPage'], $page['libelle']);
			}
			return $lstObj;
		} catch(PDOException $e) {
			die('error get all page '.$e->getMessage().'<br>');
		}
	}

	public static function getById($id)
	{
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM `page` WHERE idPage=?");
			$req->execute(array($id));
			$page=$req->fetch();
			return new Page($page['idPage'], $page['libelle']);
		} catch(PDOException $e) {
			die('error get id page '.$e->getMessage().'<br>');
		}

	}

    public static function getByLibelle($lib)
	{
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM `page` WHERE libelle=?");
			$req->execute(array($lib));
			if($page=$req->fetch()){
			 return new Page($page['idPage'], $page['libelle']);
            }else{
                return null;
            }
		} catch(PDOException $e) {
			die('error get libelle page '.$e->getMessage().'<br>');
		}

	}

	public static function create(&$page)
	{
		if (get_class($page)=="Page")
		{
			try{
				$req=SPDO::getInstance()->prepare("INSERT INTO `page`(`libelle`) VALUES (?)");
				$req->execute(array($page->getLibelle()));
				$page->setId(SPDO::getInstance()->LastInsertId());
                return $page->getId();
			} catch(PDOException $e) {
				die('error create page '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type page requis');
		}
	}

	public static function update($page)
	{
		if (get_class($page)=="Page")
		{
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `page` SET `libelle`=? WHERE `idPage`=?");
				$req->execute(array($page->getLibelle(), $page->getId()));
			} catch(PDOException $e) {
				die('error update page '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type page requis');
		}
	}

	public static function delete($page)
	{
		if (get_class($page)=="Page")
		{
			try {
				$req=SPDO::getInstance()->prepare("DELETE FROM `page` WHERE `idPage`=?");
				$req->execute(array($page->getId()));
			} catch(PDOException $e) {
				die('error delete page '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type page requis');
		}
	}
}
?>
