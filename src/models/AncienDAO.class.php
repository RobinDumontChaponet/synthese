<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Ancien.class.php");
require_once(MODELS_INC."DiplomeDUT.class.php");
require_once(MODELS_INC."DiplomePostDUT.class.php");
require_once(MODELS_INC."Etablissement.class.php");
require_once(MODELS_INC."Promotion.class.php");
require_once(MODELS_INC."Specialisation.class.php");
require_once(MODELS_INC."TypeSpecialisation.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");
require_once(MODELS_INC."ParentsDAO.class.php");

class AncienDAO {
    /**
	 * Retourne la liste de tous les anciens enregistrés dans la bdd
	 * @returns Array liste de type ancien
	 */
    public static function getAll() {
        $lstAncien=array();
        try {
            $req=SPDO::getInstance()->query("SELECT P.idPersonne, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`,sexe,dateNaissance, `mail`,idParent FROM `ancien` A, `personne` P, `compte` C WHERE P.idPersonne=A.idPersonne AND P.idPersonne=C.idPersonne ORDER BY nomUsage");
            while($ancien=$req->fetch())
            {
                $parents=ParentsDAO::getById($ancien['idParent']);
                $lstAncien[]=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi'],$parents,$ancien['sexe'],$ancien['dateNaissance'],$ancien['mail']);
            }

            return $lstAncien;
        } catch(PDOException $e) {
            die('error get all ancien '.$e->getMessage().'<br>');
        }

    }

    /**
	 * Cherche un ancien pour un id spécifique dans la base de données
	 * @param   Number $id Id de l'ancien à trouver
	 * @returns Object Objet de type ancien trouvé dans la bdd
	 */
    public static function getById($id) {
        if (is_numeric($id)) {
            try {

                $req=SPDO::getInstance()->prepare("SELECT P.idPersonne, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`,sexe,dateNaissance, `mail`,idParent FROM `ancien` A, `personne` P, `compte` C WHERE P.idPersonne=A.idPersonne AND P.idPersonne=C.idPersonne AND A.idPersonne=?");
                $req->execute(array($id));
                if($ancien=$req->fetch()){
                    $parents=ParentsDAO::getById($ancien['idParent']);
                    $ancienObj=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi'],$parents,$ancien['sexe'],$ancien['dateNaissance'],$ancien['mail']);
                    return $ancienObj;
                } else {
                    return null;
                }
            } catch(PDOException $e) {
                die('error get id ancien '.$e->getMessage().'<br>');
            }
        }
    }

    public static function getAncienByIdPromo($id){

        $lst=array();
        try {

            $req=SPDO::getInstance()->prepare("SELECT DISTINCT idPersonne FROM aEtudie WHERE idPromo=?");
            $req->execute(array($id));
            while($res=$req->fetch()) {
                $lst[]=AncienDAO::getById($res['idPersonne']);
            }
        } catch(PDOException $e) {
            die('Error getAncienByIdPromo dans AncienDAO.class.php : '.$e->getMessage().'<br>');
        }
        return $lst;

    }

    public static function create(&$ancien) {
        if (get_class($ancien)=="Ancien") {
            try {

                $idPers=PersonneDAO::create(new Personne(0, $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req = SPDO::getInstance()->prepare("INSERT INTO `ancien`(`idPersonne`, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idParent`,`dateNaissance`,sexe) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $req->execute(array($idPers, $ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal, $ancien->getVille(), $ancien->getPays(), $ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi(),$ancien->getParents()->getId(),$ancien->getDateNaissance(),$ancien->getSexe()));
                $ancien->setId($idPers);
                return $idPers;
            } catch(PDOException $e) {
                die('error create ancien '.$e->getMessage().'<br>');
            }
        } else {
            die('Create  : Paramètre de type ancien requis : '.$ancien);
        }
    }

    public static function update($ancien) {
        if (get_class($ancien) == "Ancien") {
            try {
                PersonneDAO::update(new Personne($ancien->getId(), $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req = SPDO::getInstance()->prepare("UPDATE `ancien` SET `dateNaissance`=?, `sexe`=?, `adresse1`=?,`adresse2`=?,`codePostal`=?,`ville`=? ,`pays`=?,`mobile`=?,`telephone`=?,`imageProfil`=?,`imageTrombi`=? WHERE `idPersonne`=?");
                $req->execute(array($ancien->getDateNaissance(), $ancien->getSexe(), $ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal(), $ancien->getVille(), $ancien->getPays(), $ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi(), $ancien->getId()));
            } catch(PDOException $e){
                die('error update ancien '.$e->getMessage().'<br>');
            }
        } else {
            die('Update : Paramètre de type ancien requis : '.$ancien);
        }
    }

    public static function delete($ancien) {
        if (get_class($ancien)=="Ancien") {
            try {
                PersonneDAO::delete(new Personne($ancien->getId(), $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req = SPDO::getInstance()->prepare("DELETE FROM `ancien` WHERE `idPersonne`=?");
                $req->execute(array($ancien->getId()));
            } catch(PDOException $e) {
                die('error delete ancien '.$e->getMessage().'<br>');
            }
        } else {
            die('Delete : Paramètre de type ancien requis : '.$ancien);
        }
    }

    /**
	 * Recherche une liste d'ancien dans la base de donnée
	 * @param   String   $nom         [[Description]]
	 * @param   String   $prn         [[Description]]
	 * @param   array()    $promo       [[Liste de taille 2 avec en premier la première année et en 2e la seconde]]
	 * @param   Int   $diplome     [[Description]]
	 * @param   String   $spe         [[Description]]
	 * @param   id   $typeSpe     [[Description]]
	 * @param   chaine   $PostDut     [[Description]]
	 * @param   chaine   $etabPostDut [[Description]]
	 * @param   Boolean $trav        [[Description]]
	 * @returns Object   [[Description]]
	 */
    public static function search($nom, $prn, $promo, $diplome, $spe, $typeSpe, $PostDut, $etabPostDut, $trav) {
        $lst=array();
        $args=array();
        $select="SELECT count(*) as nb, A.idPersonne, A.`adresse1`, A.`adresse2`, A.`codePostal`, A.`ville`, A.`pays`, A.`mobile`, A.`telephone`, `imageProfil`, `imageTrombi`,`nomUsage`,`nomPatronymique`,`prenom`, `mail`,`sexe`,`idParent`,`dateNaissance` ";
        $from="FROM `ancien` A, `personne` P";
        $where="WHERE P.idPersonne=A.idPersonne";

        if($nom != null) {
            $where.=" AND (P.nomUsage LIKE ? OR P.nomPatronymique LIKE ?) ";
            $args[]='%'.$nom.'%';
            $args[]='%'.$nom.'%';
        }
        if($prn!=null) {
            $where.=" AND P.prenom LIKE ? ";
            $args[]='%'.$prn.'%';
        }
        if($promo!=null && $promo!=array(null,null)) {
            if(gettype($promo)=="array") {
                $where.=" AND P.idPersonne=Etud.idPersonne AND Etud.idPromo=promo.idPromo";
                if($promo[0]!=null){
                    $where.=" AND promo.annee>=? ";
                    $args[]=$promo[0];
                }
                if($promo[1]!=null){
                    $where.=" AND promo.annee<=? ";
                    $args[]=$promo[1];
                }
                $from.=" ,`aEtudie` Etud,`promotion` promo";
            } else {
                die('erreur type promo dans search ancien');
            }
        }
        if($diplome!=null) {
            $where.=" AND P.idPersonne=Etud.idPersonne AND idDiplomeDUT=? ";
            if($promo==null || $promo==array(null,null)){ $from.=" ,`aEtudie` Etud"; }
            $args[]=$diplome;
        }
        if($spe!=null) {
            $where.=" AND P.idPersonne=Spe.idPersonne AND Spe.idSpe=Special.idSpe AND Special.libelle LIKE ? ";
            $from.=" , `estSpecialise` Spe, `specialisation` Special";
            $args[]='%'.$spe.'%';
        }
        if($typeSpe!=null) {
            $where.=" AND P.idPersonne=Spe.idPersonne AND Spe.idSpe=Special.idSpe AND Special.idTypeSpe=? ";
            if($spe==null){$from.=" , `estSpecialise` Spe, `specialisation` Special"; }
            $args[]=$typeSpe;
        }
        if($PostDut!=null) {
            $where.=" AND P.idPersonne=Poss.idPersonne AND Poss.idDiplomePost=DPost.idDiplomePost AND DPost.libelle LIKE ? ";
            $from.=" ,`possede` Poss,`diplomePostDUT` DPost";
            $args[]='%'.$PostDut.'%';
        }
        if($etabPostDut!=null) {
            $where.=" AND P.idPersonne=Poss.idPersonne AND Poss.idEtablissement=etab.idEtablissement AND etab.nom LIKE ? ";
            if($PostDut==null){ $from.=" ,`possede` Poss"; }
            $from.=", `etablissement` etab";
            $args[]='%'.$etabPostDut.'%';
        }
        if($trav==true) {
            $where.=" AND trav.idPersonne=P.idPersonne AND trav.dateEmbaucheFin is NULL";
            $from.=" , `travaille` trav";
        }
        $req=$select." ".$from." ".$where;
        /*if($binf!=null && $nb!=null){
            $req.=" LIMIT ?,?";
            $args[]=$binf;
            $args[]=$nb;
        }*/

        //var_dump($req);
        try {
            //$nbTotal=0;
            $state=SPDO::getInstance()->prepare($req);
            //var_dump($args);
            $state->execute($args);
            while($ancien=$state->fetch()) {
                /*if($nbTotal==0){
                    $nbTotal=$ancien['nb'];   
                }*/
                $parents=ParentsDAO::getById($ancien['idParent']);
                $lst[]=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi'],$parents,$ancien['sexe'],$ancien['dateNaissance'],$ancien['mail']);
                //var_dump("test");
            }
        } catch(PDOException $e) {
            die('error search ancien '.$e->getMessage().'<br>');
        }
        return $lst;
    }
}
?>
