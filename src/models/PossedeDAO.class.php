<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Possede.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."DiplomePostDUTDAO.class.php");
require_once(MODELS_INC."EtablissementDAO.class.php");

class PossedeDAO {

	public static function getAll() {
		$lst=array();
		try {
			$req=SPDO::getInstance()->query("SELECT * FROM possede");
			while ($res=$req->fetch()) {
				$ancien=AncienDAO::getById($res['idPersonne']);
				$dip=DiplomePostDUtDAO::getById($res['idDiplomePost']);
				$etab=EtablissementDAO::getById($res['idEtablissement']);
				$lst[]=new Possede($ancien, $etab, $dip, $res['resultat'], $res['dateDeb'], $res['dateFin']);
			}
		} catch(PDOException $e) {
			die('error getall possede '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getByAncien($ancien) {
		$lst=array();
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM possede WHERE idPersonne=?");
			$req->execute(array($ancien->getId()));
			while ($res=$req->fetch()) {
				$ancien=AncienDAO::getById($res['idPersonne']);
				$dip=DiplomePostDUTDAO::getById($res['idDiplomePost']);
				$etab=EtablissementDAO::getById($res['idEtablissement']);
				$lst[]=new Possede($ancien, $etab, $dip, $res['resultat'], $res['dateDeb'], $res['dateFin']);
			}
		} catch(PDOException $e) {
			die('error getByAncien possede '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function getByPossede($possede) {
		$lst=array();
		try {
			$req=SPDO::getInstance()->prepare("SELECT * FROM possede WHERE idPersonne=? AND idEtablissement=? AND idDiplomePost=?");
			$req->execute(array($possede->getAncien()->getId(), $possede->getEtablissement()->getId(), $possede->getDiplomePostDUT()->getId()));
			if($res=$req->fetch()){
				$possedeOut = new Possede($possede->getAncien(), $possede->getEtablissement(), $possede->getDiplomePostDUT(), $res['resultat'], $res['dateDeb'], $res['dateFin']);
			}
		} catch(PDOException $e) {
			die('error getByAncien possede '.$e->getMessage().'<br>');
		}
		return $possedeOut;
	}

	public static function create($obj) {
		if (get_class($obj) == "Possede") {
			try {
				$req=SPDO::getInstance()->prepare("INSERT INTO `possede`(`idPersonne`, `idDiplomePost`, `idEtablissement`, `resultat`, `dateDeb`, `dateFin`) VALUES (?,?,?,?,?,?)");
				$req->execute(array($obj->getAncien()->getId(), $obj->getDiplomePostDUT()->getId(), $obj->getEtablissement()->getId(), $obj->getResultat(), $obj->getDateDebut(), $obj->getDateFin()));
			} catch(PDOException $e) {
				die('Error create Possede dans PossedeDAO '.$e->getMessage().'<br>');
			}
		} else {
			die('Paramètre de type Possede requis dans PossedeDAO');
		}
	}

	public static function update($obj) {
		if (get_class($obj)=="Possede") {
			try {
				$req=SPDO::getInstance()->prepare("UPDATE `possede` SET `resultat`=?,`dateDeb`=?,`dateFin`=? WHERE `idPersonne`=? AND`idDiplomePost`=? AND`idEtablissement`=?");
				$req->execute(array($obj->getResultat(), $obj->getDateDeb(), $obj->getDateFin(), $obj->getAncien()->getId(), $obj->getDiplomePostDUT->getId(), $obj->getEtablissement()->getId()));
			} catch(PDOException $e) {
				die('error update possede '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type possède requis');
		}
	}

	public static function delete($obj) {
		if (get_class($obj)=="Possede") {
			try {
				$req=SPDO::getInstance()->prepare("DELETE FROM `possede` WHERE `idPersonne`=? AND`idDiplomePost`=? AND`idEtablissement`=?");
				$req->execute(array($obj->getAncien()->getId(), $obj->getDiplomePostDUT()->getId(), $obj->getEtablissement()->getId()));
			} catch(PDOException $e) {
				die('error delete possede '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type possède requis');
		}
	}

}
?>
