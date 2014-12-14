<?php
require_once(dirname(__FILE__).'/../includes/conf.inc.php');
require_once("dbConnection.inc.php");
require_once(MODELS_INC."Ancien.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");
class AncienDAO
{
	/**
	 * Retourne la liste de tous les anciens enregistrés dans la bdd
	 * @returns Array liste de type ancien
	 */
	public static function getAll()
	{
        try{
            // appelle de la connexion
            $bdd=connect();
            $req=$bdd->query("SELECT `idAncien`, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`, `mail` FROM `ancien` A, `personne` P WHERE P.idPersonne=A.idPersonne ORDER BY nomUsage");
            $lst=$req->fetchAll();
            $lstAncien=array();
            foreach ($lst as $ancien)
            {
                $ancienObj=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi']);
                $lstAncien[]=$ancienObj;
            }

            return $lstAncien;
        }catch(PDOException $e){
            die('error get all ancien '.$e->getMessage().'<br>');
        }

	}

	/**
	 * Cherche un ancien pour un id spécifique dans la base de données
	 * @param   Number $id Id de l'ancien à trouver
	 * @returns Object Objet de type ancien trouvé dans la bdd
	 */
	public static function getById($id)
	{
		if (is_numeric($id))
		{
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT `idAncien`, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`, `mail` FROM `ancien` A, `personne` P WHERE P.idPersonne=A.idPersonne AND A.idPersonne=? ORDER BY nomUsage");
                $req->execute(array($id));
                $ancien=$req->fetch();
                $ancienObj=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi']);
                return $ancienObj;
            }catch(PDOException $e){
                die('error get id ancien '.$e->getMessage().'<br>');
            }
		}
	}

	public static function create($ancien)
	{
		if (gettype($ancien)=="Ancien")
		{
            try{
                $bdd=connect();
                $idPers=PersonneDAO::create(new Personne(0, $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req=$bdd->prepare("INSERT INTO `ancien`(`idPersonne`, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $req->execute(array($idPers, $ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal, $ancien->getVille(), $ancien->getPays(), $ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi()));
            }catch(PDOException $e){
                die('error create ancien '.$e->getMessage().'<br>');
            }
		}else{
            die('paramètre de type ancien requis');
        }
	}

	public static function update($ancien)
	{
		if (gettype($ancien)=="Ancien")
		{
            try{
                $bdd=connect();
                PersonneDAO::update(new Personne($ancien->getId(), $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req=$bdd->prepare("UPDATE `ancien` SET `adresse1`=?,`adresse2`=?,`codePostal`=?,`ville`=? ,`pays`=?,`mobile`=?,`telephone`=?,`imageProfil`=?,`imageTrombi`=? WHERE `idPersonne`=?");
                $req->execute(array($ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal, $ancien->getVille(), $ancien->getPays(), $ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi(), $ancien->getId()));
            }catch(PDOException $e){
                die('error update ancien '.$e->getMessage().'<br>');
            }
		}else{
            die('paramètre de type ancien requis');
		}
	}

	public static function delete($ancien)
	{
		if (gettype($ancien)=="Ancien")
		{
            try{
                $bdd=connect();
                PersonneDAO::delete(new Personne($ancien->getId(), $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req=$bdd->prepare("DELETE FROM `ancien` WHERE `idPersonne`=?");
                $req->execute(array($ancien->getId()));
            }catch(PDOException $e){
                die('error delete ancien '.$e->getMessage().'<br>');
            }
		}else{
            die('paramètre de type ancien requis');
		}
	}

}
?>
