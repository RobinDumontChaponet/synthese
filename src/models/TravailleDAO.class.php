<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Travaille.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."PosteDAO.class.php");
require_once(MODELS_INC."EntrepriseDAO.class.php");

class TravailleDAO {

	public static function getAll() {
		$lst=array();
		try {
			$req=SPDO::getInstance()->query("SELECT * FROM travaille");
			while($res=$req->fetch()) {
				$ancien=AncienDAO::getById($res['idPersonne']);
				$poste=PosteDAO::getById($res['idPoste']);
				$ent=EntrepriseDAO::getById($res['idEntreprise']);
				$lst[]=new Travaille($ent, $poste, $ancien, $res['dateEmbaucheDeb'], $res['dateEmbaucheFin']);
			}
		} catch(PDOException $e) {
			die('error getall Travaille '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getByAncien($obj) {
		if (get_class($obj)=="Ancien") {
			$lst=array();
			try {
				$req=SPDO::getInstance()->prepare("SELECT * FROM travaille WHERE idPersonne=?");
				$req->execute(array($obj->getId()));
				while($res=$req->fetch()) {
					$ancien=AncienDAO::getById($res['idPersonne']);
					$poste=PosteDAO::getById($res['idPoste']);
					$ent=EntrepriseDAO::getById($res['idEntreprise']);
					$lst[]=new Travaille($ent, $poste, $ancien, $res['dateEmbaucheDeb'], $res['dateEmbaucheFin']);
				}
			} catch(PDOException $e) {
				die('error getByAncien Travaille '.$e->getMessage().'<br>');
			}
			return $lst;
		} else {
			die('Erreur type du parametre getbyancien travaille dao');
		}
	}
	public static function create($obj) {
		if(get_class($obj)=="Travaille") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `travaille`(`idPersonne`, `idPoste`, `idEntreprise`, `dateEmbaucheDeb`, `dateEmbaucheFin`) VALUES (?,?,?,?,?)");
				$req->execute(array($obj->getAncien()->getId(), $obj->getPoste()->getId(), $obj->getEntreprise()->getId(), $obj->getDateEmbaucheDeb(), $obj->getDateEmbaucheFin()));
			} catch(PDOException $e) {
				die('error create Travaille '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type Travaille requis');
		}
	}

	public static function update($obj) {
		if(get_class($obj)=="Travaille") {
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `travaille` SET `dateEmbaucheFin`=? WHERE `idPersonne`=?,`idPoste`=?,`idEntreprise`=?,`dateEmbaucheDeb`=?");
				$req->execute(array($obj->getDateEmbaucheFin(), $obj->getAncien()->getId(), $obj->getPoste()->getId(), $obj->getEntreprise()->getId(), $obj->getDateEmbaucheDebut()));
			} catch(PDOException $e) {
				die('error update Travaille '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type Travaille requis');
		}
	}

	public static function delete($obj) {
		if(get_class($obj)=="Travaille") {
			try {
				$req=SPDO::getInstance()->prepare("DELETE FROM `travaille` WHERE `idPersonne`=? AND `idPoste`=? AND `idEntreprise`=? AND `dateEmbaucheDeb`=?");
				$req->execute(array($obj->getAncien()->getId(), $obj->getPoste()->getId(), $obj->getEntreprise()->getId(), $obj->getDateEmbaucheDeb()));
			} catch(PDOException $e) {
				die('error delete Travaille '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type Travaille requis');
		}
	}

}
?>
