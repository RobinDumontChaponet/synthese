<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Page.class.php");

class PageDAO
{
	public static function getAll()
	{
		try {
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM `page` ORDER BY libelle");
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
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM `page` WHERE idPage=?");
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
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM `page` WHERE libelle=?");
			$req->execute(array($lib));
			$page=$req->fetch();
			return new Page($page['idPage'], $page['libelle']);
		} catch(PDOException $e) {
			die('error get libelle page '.$e->getMessage().'<br>');
		}

	}

	public static function create(&$page)
	{
		if (gettype($page)=="Page")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("INSERT INTO `page`(`libelle`) VALUES (?)");
				$req->execute(array($page->getLibelle()));
				$page->setId($bdd->LastInsertId());
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
		if (gettype($page)=="Page")
		{
			try {
				$bdd->connect();
				$req=$bdd->prepare("UPDATE `page` SET `libelle`=? WHERE `idPage`=?");
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
		if (gettype($page)=="Page")
		{
			try {
				$bdd->connect();
				$req=$bdd->prepare("DELETE FROM `page` WHERE `idPage`=?");
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
