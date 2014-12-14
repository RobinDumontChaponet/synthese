<?php
    require_once(dirname(__FILE__).'/../includes/conf.inc.php');
    require_once("dbConnection.inc.php");
    require_once(MODELS_INC."TypeSpecialisation.class.php");


    class TypeSpecialisationDAO{

        public static function getAll(){
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT `idTypeSpe`, `libelle` FROM `page` ORDER BY libelle");
                $lst=$req->fetchAll();
                $lstObj=array();
                foreach($lst as $type){
                    $lstObj[]=new TypeSpecialisation($type['idTypeSpe'], $type['libelle']);
                }
                return $lstObj;
            }catch(PDOException $e){
             die('error get all specialisation '.$e->getMessage().'<br>');
            }
        }

        public static function getById($id){
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT `idTypeSpe`, `libelle` FROM `typeSpecialisation` WHERE idTypeSpe=?");
                $req->execute(array($id));
                $type=$req->fetch();
                return new TypeSpecialisation($type['idTypeSpe'], $type['libelle']);
            }catch(PDOException $e){
                die('error get id spe '.$e->getMessage().'<br>');
            }

        }

        public static function create($type){
            if(gettype($type)=="TypeSpecialisation"){
                try{
                    $bdd->connect();
                    $req=$bdd->prepare("INSERT INTO `typeSpecialisation`(`libelle`) VALUES (?)");
                    $req->execute(array($type->getLibelle()));
                    return $bdd->LastInsertId();
                }catch(PDOException $e){
                    die('error create spe '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type spécialisation demandé');
            }
        }

        public static function update($type){
            if(gettype($type)=="TypeSpecialisation"){
                try{
                    $bdd->connect();
                    $req=$bdd->prepare("UPDATE `typeSpecialisation` SET `libelle`=? WHERE `idTypeSpe`=?");
                    $req->execute(array($type->getLibelle(),$type->getId()));
                }catch(PDOException $e){
                    die('error update spe '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type spécialisation demandé');
            }
        }

        public static function delete($type){
             if(gettype($type)=="TypeSpecialisation"){
                 try{
                    $bdd->connect();
                    $req=$bdd->prepare("DELETE FROM `typeSpecialisation` WHERE `idTypeSpe`=?");
                     $req->execute(array($type->getId()));
                 }catch(PDOException $e){
                    die('error delete spe '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type spécialisation demandé');
             }
        }

    }
?>
