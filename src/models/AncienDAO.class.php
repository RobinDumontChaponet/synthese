<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Ancien.class.php");

    class AncienDAO{
        
        
        public static function getAll(){
            // appelle de la connexion
            $bdd=connect();
            $req=$bdd->query("SELECT `idAncien`, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`, `mail` FROM `ancien` A, `personne` P WHERE P.idPersonne=A.idPersonne ORDER BY nomUsage");
            $lst=$req->fetchAll();
            $lstAncien=array();
            foreach($lst as $ancien){
                $ancienObj=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi']);
                $lstAncien[]=$ancienObj;
            }
            
            return $lstAncien;
            
        }
        
    }
?>