<?php
    require_once(dirname(__FILE__).'/../includes/conf.inc.php');
    require_once("dbConnection.inc.php");
    require_once(MODELS_INC."EstSpecialise.class.php");

    class EstSpecialiseDAO{

        public static function getAll(){
            $lst=array();
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT * FROM estSpecialise");
                while($res=$req->fetch()){
                    $ancien=AncienDAO::getById($res['idPersonne']);
                    $spe=SpecialisationDAO::getById($res['idSpe']);
                    $lst[]=new EstSpecialise($ancien,$spe);
                }
            }catch(PDOException $e){
             die('error getall EstSpecialise '.$e->getMessage().'<br>');
            }
            return $lst;
        }

        public static function getByAncien($id){
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT * FROM estSpecialise WHERE idPersonne=?");
                $req->execute(array($id));
                if($res=$req->fetch()){
                    $ancien=AncienDAO::getById($res['idPersonne']);
                    $spe=SpecialisationDAO::getById($res['idSpe']);
                    return new EstSpecialise($ancien,$spe);
                }
            }catch(PDOException $e){
             die('error get ancien EstSpecialise '.$e->getMessage().'<br>');
                return null;
            }

        }

        public static function create($obj){
            if(gettype($obj)=="EstSpecialise"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("INSERT INTO `estSpecialise`(`idPersonne`, `idSpe`) VALUES (?,?)");
                    $req->execute(array($obj->getAncien()->getId(),$obj->getSpecialisation()->getId()));
                }catch(PDOException $e){
                    die('error create EstSpecialise '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type EstSpecialise requis');
            }
        }


        public static function delete($obj){
            if(gettype($obj)=="EstSpecialise"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("DELETE FROM `estSpecialise` WHERE `idPersonne`=?, `idSpe`=?");
                    $req->execute(array($obj->getAncien()->getId(),$obj->getSpecialisation()->getId()));
                }catch(PDOException $e){
                    die('error update EstSpecialise '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type EstSpecialise   requis');
            }
        }

    }
?>
