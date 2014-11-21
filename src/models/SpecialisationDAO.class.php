<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Specialisation.class.php");
    require_once("models/TypeSpecialisation.class.php");
    require_once("models/TypeSpecialisationDAO.class.php");

    class SpecialisationDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idSpe`, `libelle`, `idTypeSpe` FROM `specialisation` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstObj=array();
            foreach($lst as $spe){
                $lstObj[]=new TypeSpecialisation($spe['idSpe'], $spe['libelle'], TypeSpecialisationDAO::getById($spe['idTypeSpe']));
            }
            return $lstObj;
        }

        public static function getById($id){

                $bdd=connect();
                $req=$bdd->prepare("SELECT `idSpe`, `libelle`, `idTypeSpe` FROM `specialisation` WHERE idSpe=?");
                $req->execute(array($id));
                $spe=$req->fetch();
                return new TypeSpecialisation($spe['idSpe'], $spe['libelle'], TypeSpecialisationDAO::getById($spe['idTypeSpe']));

        }

        public static function create($spe){
            if(gettype($spe)=="Specialisation"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `specialisation`(`libelle`, `idTypeSpe`) VALUES (?,?)");
                $req->execute(array($spe->getLibelle(), $spe->getTypeSpecialisation()->getId()));
                return $bdd->LastInsertId();
            }
        }

        public static function update($spe){
            if(gettype($spe)=="Specialisation"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `specialisation` SET `libelle`=?,`idTypeSpe`=? WHERE `idSpe`=?");
                $req->execute(array($spe->getLibelle(),$spe->getTypeSpecialisation()->getId(),$spe->getId()));
            }
        }

        public static function delete($spe){
             if(gettype($spe)=="Specialisation"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `specialisation` WHERE `idSpe`=?");
                 $req->execute(array($spe->getId()));
             }
        }

    }
?>
