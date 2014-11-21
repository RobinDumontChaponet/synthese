<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/TypeSpecialisation.class.php");


    class SpecialisationDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idTypeSpe`, `libelle` FROM `page` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstObj=array();
            foreach($lst as $type){
                $lstObj[]=new TypeSpecialisation($type['idTypeSpe'], $type['libelle']);
            }
            return $lstObj;
        }

        public static function getById($id){

                $bdd=connect();
                $req=$bdd->prepare("SELECT `idTypeSpe`, `libelle` FROM `typeSpecialisation` WHERE idTypeSpe=?");
                $req->execute(array($id));
                $type=$req->fetch();
                return new TypeSpecialisation($type['idTypeSpe'], $type['libelle']);;

        }

        public static function create($type){
            if(gettype($type)=="TypeSpecialisation"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `typeSpecialisation`(`libelle`) VALUES (?)");
                $req->execute(array($type->getLibelle()));
                return $bdd->LastInsertId();
            }
        }

        public static function update($type){
            if(gettype($type)=="TypeSpecialisation"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `typeSpecialisation` SET `libelle`=? WHERE `idTypeSpe`=?");
                $req->execute(array($type->getLibelle(),$type->getId()));
            }
        }

        public static function delete($type){
             if(gettype($type)=="TypeSpecialisation"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `typeSpecialisation` WHERE `idTypeSpe`=?");
                 $req->execute(array($type->getId()));
             }
        }

    }
?>
