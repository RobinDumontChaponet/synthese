<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Ancien.class.php");
    require_once("models/PersonneDAO.class.php");
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
        
        public static function getById($id){
            if(is_numeric($id)){
                $bdd=connect();
                $req=$bdd->prepare("SELECT `idAncien`, A.idPersonne, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`,`idCompte`,`nomUsage`,`nomPatronymique`,`prenom`, `mail` FROM `ancien` A, `personne` P WHERE P.idPersonne=A.idPersonne AND A.idPersonne=? ORDER BY nomUsage");
                $req->execute(array($id));
                $ancien=$req->fetch();
                $ancienObj=new Ancien($ancien['idPersonne'], $ancien['nomUsage'], $ancien['nomPatronymique'], $ancien['prenom'], $ancien['adresse1'], $ancien['adresse2'], $ancien['codePostal'], $ancien['ville'], $ancien['pays'], $ancien['mobile'], $ancien['telephone'], $ancien['imageProfil'], $ancien['imageTrombi']);
                return $ancienObj;
            }
        }
        
        public static function create($ancien){
            if(gettype($ancien)=="Ancien"){
                $bdd=connect();
                $idPers=PersonneDAO::create(new Personne(0, $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail())); 
                $req=$bdd->prepare("INSERT INTO `ancien`(`idPersonne`, `adresse1`, `adresse2`, `codePostal`, `ville`, `pays`, `mobile`, `telephone`, `imageProfil`, `imageTrombi`) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $req->execute(array($idPers,$ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal,$ancien->getVille(), $ancien->getPays(),$ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi()));
            }
        }
        
        public static function update($ancien){
            if(gettype($ancien)=="Ancien"){
                $bdd=connect(); 
                PersonneDAO::update(new Personne($ancien->getId(), $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req=$bdd->prepare("UPDATE `ancien` SET `adresse1`=?,`adresse2`=?,`codePostal`=?,`ville`=? ,`pays`=?,`mobile`=?,`telephone`=?,`imageProfil`=?,`imageTrombi`=? WHERE `idPersonne`=?");
                $req->execute(array($ancien->getAdresse1(), $ancien->getAdresse2(), $ancien->getCodePostal,$ancien->getVille(), $ancien->getPays(),$ancien->getMobile(), $ancien->getTelephone(), $ancien->getImageProfil(), $ancien->getImageTrombi(),$ancien->getId()));
            }
        }
        
        public static function delete($ancien){
            if(gettype($ancien)=="Ancien"){
                $bdd=connect();
                PersonneDAO::delete(new Personne($ancien->getId(), $ancien->getNom(), $ancien->getNomPatronymique(), $ancien->getPrenom(), $ancien->getMail()));
                $req=$bdd->prepare("DELETE FROM `ancien` WHERE `idPersonne`=?");
                $req->execute(array($ancien->getId()));
            }
        }
        
    }
?>