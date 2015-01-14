<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."EstSpecialise.class.php");

class EstSpecialiseDAO {

    public static function getAll() {
        $lst=array();
        try {
            $req=SPDO::getInstance()->query("SELECT * FROM estSpecialise");
            while
                ($res=$req->fetch()) {
                $ancien=AncienDAO::getById($res['idPersonne']);
                $spe=SpecialisationDAO::getById($res['idSpe']);
                $lst[]=new EstSpecialise($ancien, $spe);
            }
        } catch(PDOException $e) {
            die('error getall EstSpecialise '.$e->getMessage().'<br>');
        }
        return $lst;
    }

    public static function getByIdAncien($id) {
        try {
            $req=SPDO::getInstance()->prepare("SELECT * FROM estSpecialise WHERE idPersonne=?");
            $req->execute(array($id));
            if
                ($res=$req->fetch()) {
                $ancien=AncienDAO::getById($res['idPersonne']);
                $spe=SpecialisationDAO::getById($res['idSpe']);
                return new EstSpecialise($ancien, $spe);
            }else{
                return null;
            }
        } catch(PDOException $e) {
            die('error get ancien EstSpecialise '.$e->getMessage().'<br>');
            return null;
        }
    }

    public static function getByAncien($ancien) {
        try {
            $req=SPDO::getInstance()->prepare("SELECT * FROM estSpecialise WHERE idPersonne=?");
            $req->execute(array($ancien->getId()));
            if
                ($res=$req->fetch()) {
                $ancien=AncienDAO::getById($res['idPersonne']);
                $spe=SpecialisationDAO::getById($res['idSpe']);
                return new EstSpecialise($ancien, $spe);
            }
        } catch(PDOException $e) {
            die('error get ancien EstSpecialise '.$e->getMessage().'<br>');
            return null;
        }
    }

    public static function create($obj) {
        if(get_class($obj)=="EstSpecialise") {
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `estSpecialise`(`idPersonne`, `idSpe`) VALUES (?,?)");
                $req->execute(array($obj->getAncien()->getId(), $obj->getSpecialisation()->getId()));
            } catch(PDOException $e) {
                die('error create EstSpecialise '.$e->getMessage().'<br>');
            }
        } else {
            die('paramètre de type EstSpecialise requis');
        }
    }


    public static function delete($obj) {
        if(get_class($obj)=="EstSpecialise") {
            try{
                $req=SPDO::getInstance()->prepare("DELETE FROM `estSpecialise` WHERE `idPersonne`=?, `idSpe`=?");
                $req->execute(array($obj->getAncien()->getId(), $obj->getSpecialisation()->getId()));
            } catch(PDOException $e) {
                die('error update EstSpecialise '.$e->getMessage().'<br>');
            }
        } else {
            die('paramètre de type EstSpecialise   requis');
        }
    }

}
?>