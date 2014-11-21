<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Droit.class.php");

    class DroitDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idDroit`, `libelle` FROM `droits` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstObj=array();
            foreach($lst as $droit){
                $lstObj[]=new Droit($droit['idDroit'], $droit['libelle']);
            }
            return $lstObj;
        }

        public static function getById($id){

                $bdd=connect();
                $req=$bdd->prepare("SELECT `idDroit`, `libelle` FROM `droits` WHERE idDroit=?");
                $req->execute(array($id));
                $droit=$req->fetch();
                return new Droit($droit['idDroit'], $droit['libelle']);;

        }

        public static function create($droit){
            if(gettype($droit)=="Droit"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `droits`(`libelle`) VALUES (?)");
                $req->execute(array($droit->getLibelle()));
                return $bdd->LastInsertId();
            }
        }

        public static function update($droit){
            if(gettype($droit)=="Droit"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `droits` SET `libelle`=? WHERE `idDroit`=?");
                $req->execute(array($droit->getLibelle(),$droit->getId()));
            }
        }

        public static function delete($droit){
             if(gettype($droit)=="Droit"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `droits` WHERE `idDroit`=?");
                 $req->execute(array($droit->getId()));
             }
        }

    }
?>
