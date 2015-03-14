<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Personne.class.php");

class PersonneDAO {
	public static function getAll() {
		try {
			$req=SPDO::getInstance()->query("SELECT `idPersonne`, `nomUsage`, `nomPatronymique`, `mail`, `prenom` FROM `personne` ORDER BY nomUsage");
			$lst=$req->fetchAll();
			$lstObjet=array();
			foreach ($lst as $pers) {
				$lstObjet[]=new Personne($pers['idPersonne'], $pers['nomUsage'], $pers['nomPatronymique'], $pers['prenom'], $pers['mail']);
			}
			return $lstObjet;
		} catch(PDOException $e) {
			die('error get all personne '.$e->getMessage().'<br>');
		}
	}

	public static function getById($id) {
		if (is_numeric($id)) {
			try {
				$statement=SPDO::getInstance()->prepare("SELECT `idPersonne`, `nomUsage`, `nomPatronymique`, `mail`, `prenom` FROM `personne` WHERE idPersonne=?");
				$statement->execute(array($id));
				if ($pers=$statement->fetch()) {
					return new Personne($pers['idPersonne'], $pers['nomUsage'], $pers['nomPatronymique'], $pers['prenom'], $pers['mail']);
				} else {
					return null;
				}
			} catch(PDOException $e) {
				die('error get id personne '.$e->getMessage().'<br>');
			}
		}
	}

	public static function create(&$pers) {
		if (get_class($pers)=="Personne") {
			try {
				$req = SPDO::getInstance()->prepare("INSERT INTO `personne`(`nomUsage`, `nomPatronymique`, `mail`, `prenom`) VALUES (?,?,?,?)");
				$req->execute(array($pers->getNom(), $pers->getNomPatronymique(), $pers->getMail(), $pers->getPrenom()));
				$pers->setId(SPDO::getInstance()->LastInsertId());
				return $pers->getId();
			} catch(PDOException $e) {
				die('error create personne '.$e->getMessage().'<br>');
			}
		} else {
			die ('Create :  : paramètre de type personne demandé : '.$pers);
		}
	}

	public static function delete($pers) {
		if (get_class($pers)=="Personne") {
			try {
				$req = SPDO::getInstance()->prepare("DELETE FROM `personne` WHERE `idPersonne`=?");
				$req->execute(array($pers->getId()));
			} catch(PDOException $e) {
				die('error delete personne '.$e->getMessage().'<br>');
			}
		} else {
			die ('Delete : paramètre de type personne demandé : '.$pers);
		}
	}

	public static function update($pers) {
		if (get_class($pers) == "Personne") {
			try {
				$req = SPDO::getInstance()->prepare("UPDATE `personne` SET `nomUsage`=?,`nomPatronymique`=?,`mail`=?,`prenom`=? WHERE `idPersonne`=?");
				$req->execute(array($pers->getNom(), $pers->getNomPatronymique(), $pers->getMail(), $pers->getPrenom(), $pers->getId()));
			} catch(PDOException $e) {
				die('error update personne '.$e->getMessage().'<br>');
			}
		} else {
			die ('Update : paramètre de type personne demandé : '.$pers);
		}
	}

	/**
	 * countAlikeNames function.
	 *
	 * @access public
	 * @static
	 * @param Personne $personne
	 * @return numbers of `personne` whose name and firstname start with same 4 letters
	 *		   or 0 if none.
	 */
	public static function countAlikeNames($personne) {
		try {
			$statement=SPDO::getInstance()->prepare("SELECT count(*) as nb FROM `personne` WHERE (nomPatronymique LIKE ?) AND (prenom LIKE ?)");
			$statement->execute(array(cleanString(substr($personne->getNomPatronymique(), 0, 4)).'%', cleanString(substr($personne->getPrenom(), 0, 4)).'%'));
			if ($result=$statement->fetch())
				return $result['nb']-1;
			else
				return 0;
		} catch(PDOException $e) {
			die('Catch PersonneDAO::countAlikeNames : '.$e.getError());
		}
	}
}
?>
