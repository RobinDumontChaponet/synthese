<?php

    require_once(dirname(__FILE__).'/../includes/conf.inc.php');
    require_once("dbConnection.inc.php");
    require_once(MODELS_INC."Evenement.class.php");
    require_once(MODELS_INC."TypeEvenementDAO.class.php");

    class EvenementDAO{

        public static function getAll(){
            $lst=array();
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT * FROM evenement");
                while($res=$req->fetch()){
                    $type=TypeEvenementDAO::getById($res['idTypeEvenement']);
                    $lst[]=new Evenement($res['idEvenement'],$type);
                }
            }catch(PDOException $e){
                die('error get all Evenement '.$e->getMessage().'<br>');
            }
            return $lst;
        }

        public static function getById($id){
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT * FROM evenement WHERE idEvenement=?");
                $req->execute(array($id));
                if($res=$req->fetch()){
                    $type=TypeEvenementDAO::getById($res['idTypeEvenement']);
                    return new Evenement($res['idEvenement'],$type);
                }
            }catch(PDOException $e){
                die('error get id Evenement '.$e->getMessage().'<br>');
            }
        }

        public static function create($obj){
            if(gettype($obj)=="Evenement"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("INSERT INTO `evenement`(`idTypeEvenement`) VALUES (?)");
                    $req->execute(array($obj->getTypeEvenement()->getId()));
                    return $bdd->LastInsertId();
                }catch(PDOException $e){
                    die('error create Evenement '.$e->getMessage().'<br>');
                }
            }else{
                die('argument de type Evenement requis');
            }
        }

        public static function update($obj){
            if(gettype($obj)=="Evenement"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("UPDATE `evenement` SET `idTypeEvenement`=? WHERE `idEvenement`=?");
                    $req->execute(array($obj->getTypeEvenement()->getId(),$obj->getId()));
                }catch(PDOException $e){
                    die('error update Evenement '.$e->getMessage().'<br>');
                }
            }else{
                die('argument de type Evenement requis');
            }
        }

        public static function delete($obj){
            if(gettype($obj)=="Evenement"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("DELETE FROM `evenement` WHERE `idEvenement`=?");
                    $req->execute(array($obj->getId()));
                }catch(PDOException $e){
                    die('error update etablissement '.$e->getMessage().'<br>');
                }
            }else{
                die('argument de type Evenement requis');
            }
        }
    }

?>
