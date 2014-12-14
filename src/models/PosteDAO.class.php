<?php
    require_once(dirname(__FILE__).'/../includes/conf.inc.php');
    require_once("dbConnection.inc.php");
    require_once(MODELS_INC."Poste.class.php");

    class PosteDAO{

        public static function getAll(){
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT `idPoste`, `libelle` FROM `poste` ORDER BY libelle");
                $lst=$req->fetchAll();
                $lstposte=array();
                foreach($lst as $poste){
                    $lstposte[]=new Poste($poste['idPoste'], $poste['libelle']);
                }
                return $lstposte;
            }catch (PDOException $e) {
                die("Error get all poste !: " . $e->getMessage() . "<br/>");
            }
        }

        public static function getById($id){
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT `idPoste`, `libelle` FROM `poste` WHERE idPoste=?");
                $req->execute(array($id));
                $poste=$req->fetch();
                return new Poste($poste['idPoste'], $poste['libelle']);
            }catch (PDOException $e) {
                die("Error get id poste !: " . $e->getMessage() . "<br/>");
            }

        }

        public static function create($poste){
            if(gettype($poste)=="Poste"){
                try{
                    $bdd->connect();
                    $req=$bdd->prepare("INSERT INTO `poste`(`libelle`) VALUES (?)");
                    $req->execute(array($poste->getLibelle()));
                    return $bdd->LastInsertId();
                }catch (PDOException $e) {
                    die("Error create poste !: " . $e->getMessage() . "<br/>");
                }
            }else{
                die('argument de type Poste demandé');
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
                 try{
                    $bdd->connect();
                    $req=$bdd->prepare("DELETE FROM `poste` WHERE `idPoste`=?");
                     $req->execute(array($poste->getId()));
                 }catch (PDOException $e) {
                    die("Error delete poste !: " . $e->getMessage() . "<br/>");
                }
            }else{
                die('argument de type Poste demandé');
             }
        }

    }
?>
