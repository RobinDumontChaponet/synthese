<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/EntrepriseAPE.class.php");
    require_once("models/CodeAPE.class.php");
    require_once("models/CodeAPEDAO.class.php");

    class EntrepriseDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idEntreprise`, `codeAPE`, `nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `cedex`, `pays`, `telephone` FROM `entreprise`");
            $results=$req->fetchAll();
            $lstEnt=array();
            foreach($results as $ent){
                $lstEnt[]=new Entreprise($ent['idEntreprise'], $ent['nom'], $ent['adresse1'], $ent['adresse2'], $ent['codePostal'], $ent['ville'], $ent['cedex'], $ent['pays'], $ent['telephone'], CodeAPEDAO::getByID($ent['codeAPE']));
            }
            return $lstEnt;
        }

        public static function getById($id){
            $bdd=connect();
            $req=$bdd->prepare("SELECT `idEntreprise`, `codeAPE`, `nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `cedex`, `pays`, `telephone` FROM `entreprise` WHERE idEntreprise=?");
            $ent=$req->fetch();
            return new Entreprise($ent['idEntreprise'], $ent['nom'], $ent['adresse1'], $ent['adresse2'], $ent['codePostal'], $ent['ville'], $ent['cedex'], $ent['pays'], $ent['telephone'], CodeAPEDAO::getByID($ent['codeAPE']));

        }

        public static function create($ent){
            if(gettype($ent)=="Entreprise"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `entreprise`(`codeAPE`, `nom`, `adresse1`, `adresse2`, `codePostal`, `ville`, `cedex`, `pays`, `telephone`) VALUES (?,?,?,?,?,?,?,?,?)");
                $req->execute(array($ent->getCode(), $ent->getNom(), $ent->getAdresse1(), $ent->getAdresse2(),$ent->getCodePostal(), $ent->getVille(), $ent->getCedex(), $ent->getPays(), $ent->getTelephone()));
            }
        }

        public static function update($ent){
            if(gettype($ent)=="Entreprise"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `entreprise` SET `codeAPE`=?,`nom`=?,`adresse1`=?,`adresse2`=?,`codePostal`=? ,`ville`=?,`cedex`=?,`pays`=?,`telephone`=? WHERE idEntreprise=?");
                $req->execute(array($ent->getCode(), $ent->getNom(), $ent->getAdresse1(), $ent->getAdresse2(),$ent->getCodePostal(), $ent->getVille(), $ent->getCedex(), $ent->getPays(), $ent->getTelephone(), $ent->getId()));
            }
        }

        public static function delete($ent){
             if(gettype($ent)=="Entreprise"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `entreprise` WHERE `idEntreprise`=?");
                 $req->execute(array($ent->getId()));
             }
        }

    }
?>
