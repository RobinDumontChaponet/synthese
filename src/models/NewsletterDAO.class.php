<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."Personne.class.php");

class NewsletterDAO {

	public static function add($pers) {
		if (get_class($pers)=="Personne") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `newsletter`(`idPersonne`) VALUES (?)");
				$req->execute(array($pers->getId()));
			} catch(PDOException $e) {

			}
		} else {
			die('erreur type NewsletterDAO::add');
		}
	}

	public static function remove($pers) {
		if (get_class($pers)=="Personne") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `newsletter` WHERE `idPersonne`=?");
				$req->execute(array($pers->getId()));
			} catch(PDOException $e) {

			}
		} else {
			die('erreur type NewsletterDAO::remove');
		}
	}

	public static function abonnement($pers) {
		if (get_class($pers)=="Personne") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("Select count(*) as nb FROM `newsletter` WHERE `idPersonne`=?");
				$req->execute(array($pers->getId()));
				$res=$req->fetch();
				if ($res['nb']==1) {
					return true;
				} else {
					return false;
				}
			} catch(PDOException $e) {
				die('erreur sql newsletterDao::abo '.$e->getMessage());
			}
		} else {
			die('erreur type NewsletterDAO::abo');
		}
	}

}
?>
