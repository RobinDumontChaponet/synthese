<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/TypeEvenement.class.php");

    class TypeEvenementDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idTypeEvenement`, `libelle` FROM `typeEvenement` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lsttype=array();
            foreach($lst as $type){
                $lsttype[]=new TypeEvenement($type['idTypeEvenement'], $type['libelle']);
            }
            return $lsttype;
        }

        public static function getById($id){

                $bdd=connect();
                $req=$bdd->prepare("SELECT `idTypeEvenement`, `libelle` FROM `typeEvenement` WHERE idTypeEvenement=?");
                $req->execute(array($id));
                $type=$req->fetch();
                return new TypeEvenement($type['idTypeEvenement'], $type['libelle']);

        }

        public static function create($type){
            if(gettype($type)=="TypeEvenement"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `typeEvenement`(`libelle`) VALUES (?)");
                $req->execute(array($type->getLibelle()));
                return $bdd->LastInsertId();
            }
        }

        public static function update($type){
            if(gettype($type)=="TypeEvenement"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `typeEvenement` SET `libelle`=? WHERE `idTypeEvenement`=?");
                $req->execute(array($type->getLibelle(),$type->getId()));
            }
        }

        public static function delete($type){
             if(gettype($type)=="TypeEvenement"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `typeEvenement` WHERE `idTypeEvenement`=?");
                 $req->execute(array($type->getId()));
             }
        }

    }
?>
