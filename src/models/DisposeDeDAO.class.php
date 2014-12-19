<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."DisposeDe.class.php");
require_once(MODELS_INC."TypeProfilDAO.class.php");
require_once(MODELS_INC."DroitDAO.class.php");
require_once(MODELS_INC."PageDAO.class.php");
require_once(MODELS_INC."Page.class.php");
require_once(MODELS_INC."TypeProfil.class.php");
class DisposeDeDAO
{

	public static function getAll()
	{
		$lst=array();
		try{
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM disposeDe");
			while ($res=$req->fetch())
			{
				$prof=TypeProfilDAO::getById($res['idProfil']);
				$droit=DroitDAO::getById($res['idDroit']);
				$page=PageDAO::getById($res['idPage']);
				$lst[]=new DisposeDe($prof, $droit, $page);
			}
		} catch(PDOException $e) {
			die('error getall diposede '.$e->getMessage().'<br />');
		}
		return $lst;
	}

	public static function getByTypeProfilAndPage($type, $page)
	{
		if (get_class($type)=="TypeProfil" && get_class($page)=="Page")
		{
			try {
				$bdd=connect();
				$req=$bdd->prepare("SELECT * FROM disposeDe WHERE idProfil=? AND idPage=?");
				$req->execute(array($type->getId(), $page->getId()));
                $dipos=new DisposeDe($type,array(),$page);
				while ($res=$req->fetch())
				{
					$lst=$dipos->getDroit();
                    $d=DroitDAO::getById($res['idDroit']);
                    $lst[$d->getLibelle()]=$d;
                    $dipos->setDroit($lst);
				}
                return $dipos;
			} catch (PDOException $e) {
				die('error get profil & page disposede '.$e->getMessage().'<br />');
			}
		} else {
			die('Mauvais type de parametres :'.get_class($type).'     :    '.get_class($page));
		}

	}

	public static function getByTypeProfil($type)
	{
		$lst=array();
		if (get_class($type)=="TypeProfil")
		{
			try {
				$bdd=connect();
				$req=$bdd->prepare("SELECT * FROM disposeDe WHERE idProfil=?");
				$req->execute(array($type->getId()));
				while ($res=$req->fetch())
				{
					$prof=TypeProfilDAO::getById($res['idProfil']);
					$droit=DroitDAO::getById($res['idDroit']);
					$page=PageDAO::getById($res['idPage']);
					$lst[]= new DisposeDe($prof, $droit, $page);
				}
			} catch(PDOException $e) {
				die('error get profil disposede '.$e->getMessage().'<br />');
				return null;
			}
		} else {
			die('type param de type typeProfil requis');
		}
		return $lst;

	}

	public static function getByPage($page)
	{
		$lst=array();
		if (get_class($type)=="Page")
		{
			try{
				$bdd=connect();
				$req=$bdd->prepare("SELECT * FROM disposeDe WHERE idPage=?");
				$req->execute(array($page->getId()));
				while ($res=$req->fetch())
				{
					$prof=TypeProfilDAO::getById($res['idProfil']);
					$droit=DroitDAO::getById($res['idDroit']);
					$page=PageDAO::getById($res['idPage']);
					$lst[]= new DisposeDe($prof, $droit, $page);
				}
			} catch(PDOException $e) {
				die('error get page dip disposede '.$e->getMessage().'<br />');
				return null;
			}
		} else {
			die('type param de type typeProfil requis');
		}
		return $lst;

	}

	public static function create($obj)
	{
		if (get_class($obj)=="DisposeDe")
		{
			try {
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `disposeDe`(`idProfil`, `idDroit`, `idPage`) VALUES (?,?,?)");
				$req->execute(array($obj->getTypeProfil()->getId(), $obj->getDroit()->getId(), $obj->getPage->getId()));
			} catch(PDOException $e) {
				die('error create diposede '.$e->getMessage().'<br />');
			}
		} else {
			die('paramètre de type disposede requis');
		}
	}


	public static function delete($obj)
	{
		if (get_class($obj)=="DisposeDe")
		{
			try {
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `disposeDe` WHERE `idProfil`=?, `idDroit`=?, `idPage`=?");
				$req->execute(array($obj->getTypeProfil()->getId(), $obj->getDroit()->getId(), $obj->getPage->getId()));
			} catch(PDOException $e) {
				die('error update disposede '.$e->getMessage().'<br />');
			}
		} else {
			die('paramètre de type DisposeDe requis');
		}
	}

}
?>
