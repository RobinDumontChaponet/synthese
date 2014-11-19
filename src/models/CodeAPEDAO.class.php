<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Promotion.class.php");

    class PromotionDAO{
        
        public static function getAll(){
            $bdd=$connect();
            $req=$bdd->query("SELECT `idPromo`, `annee` FROM `promotion` ORDER BY annee");
            $lst=$req->fetchAll();
            $lstPromo=array();
            foreach($lst as $promo){
                $lstPromo[]=new Promotion($promo['idPromo'], $promo['annee']);   
            }
            return $lstPromo;
        }
        
        public static function getById($id){
            if(is_numeric($id)){
                $bdd=connect();
                $req=$bdd->prepare("SELECT `idPromo`, `annee` FROM `promotion` WHERE idPromo=?");
                $req->execute(array($id));
                $promo=$req->fetch();
                return new Promotion($promo['idPromo'], $promo['annee']);
            }
        }
        
        public static function create($promo){
            if(gettype($promo)=="Promotion"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `promotion`(`annee`) VALUES (?)");
                $req->execute(array($promo->getAnnee()));
                return $bdd->LastInsertId();
            }
        }
        
        public static function update($promo){
            if(gettype($promo)=="Promotion"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `promotion` SET `annee`=? WHERE idPromo=?");
                $req->execute(array($promo->getAnnee(), $promo->getId()));
            }
        }
        
        public static function delete($promo){
             if(gettype($promo)=="Promotion"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `promotion` WHERE `idPromo`=?");
                 $req->execute(array($promo->getId()));
             }
        }
        
    }
?>