<?php
    require_once('conf.inc.php');
    require_once("dbConnection.inc.php");
    require_once(MODELS_INC."DisposeDe.class.php");
    require_once(MODELS_INC."ProfilDAO.class.php");
    require_once(MODELS_INC."DroitDAO.class.php");
    require_once(MODELS_INC."PageDAO.class.php");

    class DisposeDeDAO{

        public static function getAll(){
            $lst=array();
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT * FROM disposeDe");
                while($res=$req->fetch()){
                    $prof=ProfilDAO::getById($res['idProfil']);
                    $droit=DroitDAO::getById($res['idDroit']);
                    $page=PageDAO::getById($res['idPage']);
                    $lst[]=new DisposeDe($prof,$droit,$page);
                }
            }catch(PDOException $e){
             die('error getall diposede '.$e->getMessage().'<br>');
            }
            return $lst;
        }

        public static function getByProfil($id){
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT * FROM disposeDe WHERE idProfil=?");
                $req->execute(array($id));
                if($res=$req->fetch()){
                    $prof=ProfilDAO::getById($res['idProfil']);
                    $droit=DroitDAO::getById($res['idDroit']);
                    $page=PageDAO::getById($res['idPage']);
                    return new DisposeDe($prof,$droit,$page);
                }
            }catch(PDOException $e){
             die('error get profil disposede '.$e->getMessage().'<br>');
                return null;
            }

        }

        public static function getByPage($id){
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT * FROM disposeDe WHERE idPage=?");
                if($res=$req->fetch()){
                    $prof=ProfilDAO::getById($res['idProfil']);
                    $droit=DroitDAO::getById($res['idDroit']);
                    $page=PageDAO::getById($res['idPage']);
                    return new DisposeDe($prof,$droit,$page);
                }
            }catch(PDOException $e){
             die('error get page dip disposede '.$e->getMessage().'<br>');
                return null;
            }

        }

        public static function create($obj){
            if(gettype($obj)=="DisposeDe"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("INSERT INTO `disposeDe`(`idProfil`, `idDroit`, `idPage`) VALUES (?,?,?)");
                    $req->execute(array($obj->getTypeProfil()->getId(),$obj->getDroit()->getId(),$obj->getPage->getId()));
                }catch(PDOException $e){
                    die('error create diposede '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type disposede requis');
            }
        }


        public static function delete($obj){
            if(gettype($obj)=="DisposeDe"){
                try{
                    $bdd=connect();
                    $req=$bdd->prepare("DELETE FROM `disposeDe` WHERE `idProfil`=?, `idDroit`=?, `idPage`=?");
                    $req->execute(array($obj->getTypeProfil()->getId(),$obj->getDroit()->getId(),$obj->getPage->getId()));
                }catch(PDOException $e){
                    die('error update disposede '.$e->getMessage().'<br>');
                }
            }else{
                die('paramètre de type DisposeDe requis');
            }
        }

    }
?>
