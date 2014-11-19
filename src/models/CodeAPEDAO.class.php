<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/CodeAPE.class.php");

    class CodeAPEDAO{
        
        public static function getAll(){
            $bdd=$connect();
            $req=$bdd->query("SELECT `code`, `libelle` FROM `codeAPE` ORDER BY code");
            $lst=$req->fetchAll();
            $lstcode=array();
            foreach($lst as $code){
                $lstcode[]=new CodeAPE($code['code'], $code['libelle']);   
            }
            return $lstPromo;
        }
        
        public static function getById($code){
            
                $bdd=connect();
                $req=$bdd->prepare("SELECT `code`, `libelle` FROM `codeAPE` WHERE code=?");
                $req->execute(array($id));
                $code=$req->fetch();
                return new CodeAPE($code['code'], $code['libelle']);
            
        }
        
        public static function create($code){
            if(gettype($promo)=="CodeAPE"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `codeAPE`(`code`, `libelle`) VALUES (?,?)");
                $req->execute(array($code->getCode(),$code->getLibelle()));
                return $bdd->LastInsertId();
            }
        }
        
        public static function update($promo){
            if(gettype($promo)=="CodeAPE"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `codeAPE` SET `libelle`=? WHERE code=?");
                $req->execute(array($code->getLibelle(),$code->getCode()));
            }
        }
        
        public static function delete($code){
             if(gettype($promo)=="CodeAPE"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `codeAPE` WHERE `code`=?");
                 $req->execute(array($code->getCode()));
             }
        }
        
    }
?>