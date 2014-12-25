<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Possede.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."DiplomePostDUTDAO.class.php");
require_once(MODELS_INC."EtablissementDAO.class.php");

class PossedeDAO {

	public static function getAll() {
		$lst=array();
		try {
			$bdd=connect();
			$req=$bdd->query("SELECT * FROM possede");
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

	public static function getByAncien($id) {
		$lst=array();
		try {
			$bdd=connect();
			$req=$bdd->prepare("SELECT * FROM possede WHERE idPersonne=?");
			$req->execute(array($id));
			while ($res=$req->fetch()) {
				$ancien=AncienDAO::getById($res['idPersonne']);
				$dip=DiplomePostDUtDAO::getById($res['idDiplomePost']);
				$etab=EtablissementDAO::getById($res['idEtablissement']);
				$lst[]=new Possede($ancien, $etab, $dip, $res['resultat'], $res['dateDeb'], $res['dateFin']);
			}
		} catch(PDOException $e) {
			die('error getByAncien possede '.$e->getMessage().'<br>');
		}
		return $lst;
	}

	public static function create($obj) {
		if (get_class($obj)=="Possede") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("INSERT INTO `possede`(`idPersonne`, `idDiplomePost`, `idEtablissement`, `resultat`, `dateDeb`, `dateFin`) VALUES (?,?,?,?,?,?)");
				$req->execute(array($obj->getAncien()->getId(), $obj->getDiplomePostDUT->getId(), $obj->getEtablissement()->getId(), $obj->getResultat(), $obj->getDateDeb(), $obj->getDateFin()));
			} catch(PDOException $e) {
				die('error create possede '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type possède requis');
		}
	}

	public static function update($obj) {
		if (get_class($obj)=="Possede") {
			try {
				$bdd=connect();
				$req=$bdd->prepare("UPDATE `possede` SET `resultat`=?,`dateDeb`=?,`dateFin`=? WHERE `idPersonne`=?,`idDiplomePost`=?,`idEtablissement`=?");
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
				$bdd=connect();
				$req=$bdd->prepare("DELETE FROM `possede` WHERE `idPersonne`=?,`idDiplomePost`=?,`idEtablissement`=?");
				$req->execute(array($obj->getAncien()->getId(), $obj->getDiplomePostDUT->getId(), $obj->getEtablissement()->getId()));
			} catch(PDOException $e) {
				die('error delete possede '.$e->getMessage().'<br>');
			}
		} else {
			die('paramètre de type possède requis');
		}
	}

}
?>
