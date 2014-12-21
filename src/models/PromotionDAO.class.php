<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Promotion.class.php");

class PromotionDAO
{

	public static function getAll()
	{
		try {
			$bdd=connect();
			$req=$bdd->query("SELECT `idPromo`, `annee` FROM `promotion` ORDER BY annee DESC");
			$lst=$req->fetchAll();
			$lstPromo=array();
			foreach ($lst as $promo)
			{
				$lstPromo[]=new Promotion($promo['idPromo'], $promo['annee']);
			}
			return $lstPromo;
		} catch(PDOException $e) {
			die('error get all promo '.$e->getMessage().'<br>');
		}
	}

	public static function getById($id)
	{
		if (is_numeric($id))
		{
			try {
				$bdd=connect();
				$req=$bdd->prepare("SELECT `idPromo`, `annee` FROM `promotion` WHERE idPromo=?");
				$req->execute(array($id));
				$promo=$req->fetch();
				return new Promotion($promo['idPromo'], $promo['annee']);
			} catch(PDOException $e) {
				die('error get id promo '.$e->getMessage().'<br>');
			}
		}
	}

	public static function create(&$promo)
	{
		if (get_class($promo)=="Promotion")
		{
			try {
				$bdd->connect();
				$req=$bdd->prepare("INSERT INTO `promotion`(`annee`) VALUES (?)");
				$req->execute(array($promo->getAnnee()));
				$promo->setId($bdd->LastInsertId());
                return $promo->getId();
			} catch(PDOException $e) {
				die('error create promo '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type promo requis');
		}
	}

	public static function update($promo)
	{
		if (get_class($promo)=="Promotion")
		{
			try {
				$bdd->connect();
				$req=$bdd->prepare("UPDATE `promotion` SET `annee`=? WHERE idPromo=?");
				$req->execute(array($promo->getAnnee(), $promo->getId()));
			} catch(PDOException $e) {
				die('error update promo '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type promo requis');
		}
	}

	public static function delete($promo)
	{
		if (get_class($promo)=="Promotion")
		{
			try{
				$bdd->connect();
				$req=$bdd->prepare("DELETE FROM `promotion` WHERE `idPromo`=?");
				$req->execute(array($promo->getId()));
			} catch(PDOException $e) {
				die('error delete promo '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type promo requis');
		}
	}

}
?>
