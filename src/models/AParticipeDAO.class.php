<?php
require_once("dbConnection.inc.php");
require_once(MODELS_INC."AParticipe.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."EvenementDAO.class.php");

class AParticipeDAO {

	public static function getAll() {
		try {
			$lst=array();
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM aParticipe");
			while($result=$req->fetch()) {
				$event=EvenementDAO::getById($result['idEvenement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$lst[]=new aParticipe($pers, $event);
			}
			return $lst;
		} catch(PDOException $e) {
			die('error getAll a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getByIdEvent($id) {
		try {
			$lst=array();
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM aParticipe WHERE idEvenement=?");
			$req->execute(array($id));
			while($result=$req->fetch()) {
				$event=EvenementDAO::getById($result['idEvenement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$lst[]=new aParticipe($pers, $event);
			}
			return $lst;
		} catch(PDOException $e) {
			die('error getByEvent a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getByIdPersonne($id) {
		try {
			$lst=array();
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM aParticipe WHERE idPersonne=?");
			$req->execute(array($id));
			while($result=$req->fetch()) {
				$event=EvenementDAO::getById($result['idEvenement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$lst[]=new aParticipe($pers, $event);
			}
			return $lst;
		} catch(PDOException $e) {
			die('error getByEvent a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function getAParticipePost($idPers) {
		try {
			$lst=array();
			$bdd=connect();
			$req = $bdd->prepare("SELECT * FROM aParticipe A, evenement E WHERE A.idPersonne=? AND A.idEvenement=E.idEvenement AND E.date>=now()");
			$req->execute(array($idPers));
			while ($result=$req->fetch()) {
				$event=EvenementDAO::getById($result['idEvenement']);
				$pers=AncienDAO::getById($result['idPersonne']);
				$lst[]=new aParticipe($pers, $event);
			}
			return $lst;
		} catch(PDOException $e) {
			die('error getAParticipePost a etudie '.$e->getMessage().'<br>');
		}
	}

	public static function create($obj) {
		if(get_class($obj)=="AParticipe") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `aParticipe`(`idPersonne`, `idEvenement`) VALUES (?,?)");
				$req->execute(array($obj->getAncien()->getId(), $obj->getEvenement()->getId()));
			} catch(PDOException $e) {
				die('error create aParticipe '.$e->getMessage().'<br>');
			}
		} else {
			die('Create : paramètre de type aParticipe requis'.get_class($obj));
		}
	}

	public static function delete($obj) {
		if(get_class($obj)=="AParticipe") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `aParticipe` WHERE `idPersonne`=? AND `idEvenement`=?");
				$req->execute(array($obj->getPersonne()->getId(), $obj->getEvenement()->getId()));
			} catch(PDOException $e) {
				die('error delete aParticipe '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type aParticipe requis');
		}
	}

}
?>
