<?php

require_once("dbConnection.inc.php");
require_once(MODELS_INC."Ancien.class.php");
require_once(MODELS_INC."DiplomeDUT.class.php");
require_once(MODELS_INC."DiplomePostDUT.class.php");
require_once(MODELS_INC."Etablissement.class.php");
require_once(MODELS_INC."Promotion.class.php");
require_once(MODELS_INC."Specialisation.class.php");
require_once(MODELS_INC."TypeSpecialisation.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");
require_once(MODELS_INC."ParentsDAO.class.php");

class AncienDAO
{
	/**
	 * Retourne la liste de tous les anciens enregistrés dans la bdd
	 * @returns Array liste de type ancien
	 */
	public static function getAll()
	{
        $lstAncien=array();
		try{
			// Appel de la connexion
			$bdd=connect();
			$req=$bdd->query("SELECT P.idPersonne, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`,sexe,dateNaissance, `mail`,idParent FROM `ancien` A, `personne` P, `compte` C WHERE P.idPersonne=A.idPersonne AND P.idPersonne=C.idPersonne ORDER BY nomUsage");
			while($ancien=$req->fetch())
			{
                $parents=ParentsDAO::getById($ancien['idParent']);
				$lstAncien[]=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi'],$parents,$ancien['sexe'],$ancien['dateNaissance'],$ancien['mail']);
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
				$req=$bdd->prepare("SELECT P.idPersonne, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`,sexe,dateNaissance, `mail`,idParent FROM `ancien` A, `personne` P, `compte` C WHERE P.idPersonne=A.idPersonne AND P.idPersonne=C.idPersonne AND A.idPersonne=?");
				$req->execute(array($id));
				if($ancien=$req->fetch()){
                $parents=ParentsDAO::getById($ancien['idParent']);
				$ancienObj=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi'],$parents,$ancien['sexe'],$ancien['dateNaissance'],$ancien['mail']);
				return $ancienObj;
                }else{
                    return null;
                }
			}catch(PDOException $e){
				die('error get id ancien '.$e->getMessage().'<br>');
			}
		}
	}

	public static function create(&$ancien)
	{
		if (gettype($ancien)=="Ancien")
		{
			try{
				$bdd=connect();
				$idPers=PersonneDAO::create(new Personne(0, $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
				$req=$bdd->prepare("INSERT INTO `ancien`(`idPersonne`, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idParent`,`dateNaissance`,sexe) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$req->execute(array($idPers, $ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal, $ancien->getVille(), $ancien->getPays(), $ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi(),$ancien->getParents()->getId(),$ancien->getDateNaissance(),$ancien->getSexe()));
                $ancien->setId($idPers);
                return $idPers;
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

	/**
	 * Recherche une liste d'ancien dans la base de donnée
	 * @param   String   $nom         [[Description]]
	 * @param   String   $prn         [[Description]]
	 * @param   Int    $promo       [[Description]]
	 * @param   Int   $diplome     [[Description]]
	 * @param   String   $spe         [[Description]]
	 * @param   id   $typeSpe     [[Description]]
	 * @param   chaine   $PostDut     [[Description]]
	 * @param   chaine   $etabPostDut [[Description]]
	 * @param   Boolean $trav        [[Description]]
	 * @returns Object   [[Description]]
	 */
	public static function search($nom, $prn, $promo, $diplome, $spe, $typeSpe, $PostDut, $etabPostDut, $trav)
	{
		$lst=array();
		$args=array();
		$req="SELECT `idAncien`, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`, `mail` FROM `ancien` A, `personne` P,`aEtudie` Etud,`promotion` promo, `estSpecialise` Spe, `specialisation` Special,`possede` Poss, `etablissement` etab,`diplomePostDUT` DPost, `travaille` trav WHERE P.idPersonne=A.idPersonne ";
		if($nom != null)
		{
			$req.=" AND P.nomUsage LIKE '%?%' ";
			$args[]=$nom;
		}
		if($prn!=null)
		{
			$req.=" AND P.prenom LIKE '%?%' ";
			$args[]=$nom;
		}
		if($promo!=null)
		{
			$req.=" AND P.idPersonne=Etud.idPersonne AND Etud.idPromo=promo.idPromo AND promo.annee>=? && promo.annee<=? ";
			$args[]=$promo;
            $args[]=$promo+2;
		}
		if($diplome!=null)
		{
			$req.=" AND P.idPersonne=Etud.idPersonne AND idDiplomeDUT=? ";
			$args[]=$diplome;
		}
		if($spe!=null)
		{
			$req.=" AND P.idPersonne=Spe.idPersonne AND Spe.idSpe=? ";
			$args[]=$spe;
		}
		if($typeSpe!=null)
		{
			$req.=" AND P.idPersonne=Spe.idPersonne AND Spe.idSpe=Special.idSpe AND Special.idTypeSpe=? ";
			$args[]=$typeSpe;
		}
		if($PostDut!=null)
		{
			$req.=" AND P.idPersonne=Poss.idPersonne AND Poss.idDiplomePost=DPost.idDiplomePost AND DPost.libelle LIKE '%?%' ";
			$args[]=$PostDut;
		}
		if($etabPostDut!=null)
		{
			$req.=" AND P.idPersonne=Poss.idPersonne AND Poss.idEtablissement=etab.idEtablissement AND etab.nom LIKE '%?%' ";
			$args[]=$etabPostDut;
		}
        if($trav==true){
             $req.=" AND trav.idPersonne=P.idPersonne AND trav.EmbaucheFin=NULL GROUP BY P.idPersonne";
        }
		try{
			$bdd=connect();
			$state=$bdd->prepare($req);
			$state->execute($args);
			while($ancien=$state->fetch())
			{
				$lst[]=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi']);
			}
		}catch(PDOException $e){
			die('error search ancien '.$e->getMessage().'<br>');
		}
		return $lst;
	}
}
?>
