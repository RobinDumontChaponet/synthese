<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Poste.class.php");

    class PosteDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idPoste`, `libelle` FROM `poste` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstposte=array();
            foreach($lst as $poste){
                $lstposte[]=new Poste($poste['idPoste'], $poste['libelle']);
            }
            return $lstposte;
        }

        public static function getById($id){

                $bdd=connect();
                $req=$bdd->prepare("SELECT `idPoste`, `libelle` FROM `poste` WHERE idPoste=?");
                $req->execute(array($id));
                $poste=$req->fetch();
                return new Poste($poste['idPoste'], $poste['libelle']);

        }

        public static function create($poste){
            if(gettype($poste)=="Poste"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `poste`(`libelle`) VALUES (?)");
                $req->execute(array($poste->getLibelle()));
                return $bdd->LastInsertId();
            }
        }

        public static function update($poste){
            if(gettype($poste)=="Poste"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `poste` SET `libelle`=? WHERE `idPoste`=?");
                $req->execute(array($poste->getLibelle(),$poste->getId()));
            }
        }

        public static function delete($poste){
             if(gettype($poste)=="Poste"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `poste` WHERE `idPoste`=?");
                 $req->execute(array($poste->getId()));
             }
        }

    }
?>
