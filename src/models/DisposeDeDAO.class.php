<?php
require_once("SPDO.class.php");
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
			$req=SPDO::getInstance()->query("SELECT idProfil FROM disposeDe GROUP BY idProfil");
			while ($res=$req->fetch())
			{
                $type=TypeProfilDAO::getById($res['idProfil']);
				$lst[]=DisposeDeDAO::getByTypeProfil($type);
			}
		} catch(PDOException $e) {
			die('error getall diposede '.$e->getMessage().'<br />');
		}
		return $lst;
	}

	public static function getByTypeProfilAndPage($type, $page)
	{
		if (get_class($type)=="TypeProfil" && get_class($page)=="Page"){
			try {
				$req=SPDO::getInstance()->prepare("SELECT * FROM disposeDe WHERE idProfil=? AND idPage=?");
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
		if (get_class($type)=="TypeProfil"){
			try {
				$req=SPDO::getInstance()->prepare("SELECT idPage FROM disposeDe WHERE idProfil=? GROUP BY idPage");
				$req->execute(array($type->getId()));
				while ($res=$req->fetch())
				{
                    $page=PageDAO::getById($res['idPage']);
					$lst[]=DisposeDeDAO::getByTypeProfilAndPage($type,$page);
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
		if (get_class($page)=="Page")
		{
			try{
				$req=SPDO::getInstance()->prepare("SELECT idProfil FROM disposeDe WHERE idPage=? GROUP BY idProfil");
				$req->execute(array($page->getId()));
				while ($res=$req->fetch())
				{
					$type=TypeProfilDAO::getById($res['idProfil']);
					$lst[]=DisposeDeDAO::getByTypeProfilAndPage($type,$page);
				}
			} catch(PDOException $e) {
				die('error get page dip disposede '.$e->getMessage().'<br />');
				return null;
			}
		} else {
			die('type param de type page requis');
		}
		return $lst;

	}

	public static function create($obj)
	{
		if (get_class($obj)=="DisposeDe")
		{
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `disposeDe`(`idProfil`, `idDroit`, `idPage`) VALUES (?,?,?)");
                $lstDroit=$obj->getDroit();
                foreach($droit as $lstDroit){
				    $req->execute(array($obj->getTypeProfil()->getId(), $droit->getId(), $obj->getPage->getId()));
                }
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
				$req=SPDO::getInstance()->prepare("DELETE FROM `disposeDe` WHERE `idProfil`=?, `idDroit`=?, `idPage`=?");
                $lstDroit=$obj->getDroit();
                foreach($droit as $lstDroit){
				    $req->execute(array($obj->getTypeProfil()->getId(), $droit->getId(), $obj->getPage->getId()));
                }
			} catch(PDOException $e) {
				die('error update disposede '.$e->getMessage().'<br />');
			}
		} else {
			die('paramètre de type DisposeDe requis');
		}
	}

}
?>
