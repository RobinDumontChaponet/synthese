<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Parents.class.php");

    class ParentsDAO{
        
        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idParent`, `adresse1`, `adresse2`, `codePostale`, `ville`, `pays`, `mobile`, `telephone` FROM `parents`");
            $lst=$req->fetchAll();
            $lstObj=array();
            foreach($lst as $parents){
                $lstObj[]=new Parents($parents['idParent'], $parents['adresse1'], $parents['adresse2'], $parents['codePostale'], $parents['ville'], $parents['pays'], $parents['mobile'], $parents['telephone']);   
            }
            return $lstObj;
        }
        
        public static function getById($id){
            if(is_numeric($id)){
                $bdd=connect();
                $req=$bdd->prepare("SELECT `idParent`, `adresse1`, `adresse2`, `codePostale`, `ville`, `pays`, `mobile`, `telephone` FROM `parents` WHERE `idParent`=?");
                $req->execute(array($id));
                $parents=$req->fetch();
                return new Parents($parents['idParent'], $parents['adresse1'], $parents['adresse2'], $parents['codePostale'], $parents['ville'], $parents['pays'], $parents['mobile'], $parents['telephone']);
            }
        }
        
        public static function create($parents){
            if(gettype($parents)=="Parents"){
                $bdd=connect();
                $req=$bdd->prepare("INSERT INTO `parents`(`adresse1`, `adresse2`, `codePostale`, `ville`, `pays`, `mobile`, `telephone`) VALUES (?,?,?,?,?,?,?)");
                $req->execute(array($parents->getAdresse1(), $parents->getAdresse2(),$parents->getCodePostal(), $parents->getVille(), $parents->getPays(), $parents->getMobile(), $parents->getTelephone()));
                return $bdd->LastInsertId();
            }
        }
        
        public static function update($parents){
            if(gettype($parents)=="Parents"){
                $bdd=connect();
                $req=$bdd->prepare("UPDATE `parents` SET `adresse1`=?,`adresse2`=?,`codePostale`=?,`ville`=?,`pays`=?,`mobile`=?,`telephone`=? WHERE `idParent`=?");
                $req->execute(array($parents->getAdresse1(), $parents->getAdresse2(),$parents->getCodePostal(), $parents->getVille(), $parents->getPays(), $parents->getMobile(), $parents->getTelephone(),$parents->getId()));
            }
        }
        
        public static function delete($parents){
             if(gettype($parents)=="Parents"){
                $bdd=connect();
                $req=$bdd->prepare("DELETE FROM `parents` WHERE `idParent`=?");
                $req->execute(array($parents->getId()));
             }
        }
        
    }
?>