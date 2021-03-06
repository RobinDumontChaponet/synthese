<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."AParticipe.class.php");
require_once(MODELS_INC."AncienDAO.class.php");
require_once(MODELS_INC."EvenementDAO.class.php");

class AParticipeDAO {

    public static function getAll() {
        try {
            $lst=array();
            $req=SPDO::getInstance()->query("SELECT * FROM aParticipe");
            while($result=$req->fetch()) {
                $event=EvenementDAO::getById($result['idEvenement']);
                $pers=AncienDAO::getById($result['idPersonne']);
                $lst[]=new aParticipe($pers, $event);
            }
            return $lst;
        } catch(PDOException $e) {
            die('error getAll a etudie '.$e->getMessage().'<br>');
        }
    }

    public static function getByIdEvent($id) {
        try {
            $lst=array();
            $req=SPDO::getInstance()->prepare("SELECT * FROM aParticipe WHERE idEvenement=?");
            $req->execute(array($id));
            while($result=$req->fetch()) {
                $event=EvenementDAO::getById($result['idEvenement']);
                $pers=AncienDAO::getById($result['idPersonne']);
                $lst[]=new aParticipe($pers, $event);
            }
            return $lst;
        } catch(PDOException $e) {
            die('error getByEvent a etudie '.$e->getMessage().'<br>');
        }
    }

    public static function getByIdPersonne($id) {
        try {
            $lst=array();
            $req=SPDO::getInstance()->prepare("SELECT * FROM aParticipe WHERE idPersonne=?");
            $req->execute(array($id));
            while($result=$req->fetch()) {
                $event=EvenementDAO::getById($result['idEvenement']);
                $pers=AncienDAO::getById($result['idPersonne']);
                $lst[]=new aParticipe($pers, $event);
            }
            return $lst;
        } catch(PDOException $e) {
            die('error getByEvent a etudie '.$e->getMessage().'<br>');
        }
    }

    public static function getAParticipePost($idPers,$binf,$nb,&$nbTotal) {
        try {
            $lst=array();
            $sql="SELECT * FROM aParticipe A, evenement E WHERE A.idPersonne=? AND A.idEvenement=E.idEvenement AND (E.date>=now() OR date IS NULL)";
            if($nb!=null){
                if($binf==null){ $binf=0; }
                $sql.=" LIMIT ".$binf.",".$nb."";
            }
            $nbTotal=AParticipeDAO::getNbAParticipePost($idPers);
            $req = SPDO::getInstance()->prepare($sql);
            $req->execute(array($idPers));
            while ($result=$req->fetch()) {
                $event=EvenementDAO::getById($result['idEvenement']);
                $pers=AncienDAO::getById($result['idPersonne']);
                $lst[]=new aParticipe($pers, $event);
            }
            return $lst;
        } catch(PDOException $e) {
            die('error getAParticipePost a etudie '.$e->getMessage().'<br>');
        }
    }

    public static function getNbAParticipePost($idPers) {
        try {
            $req = SPDO::getInstance()->prepare("SELECT count(*) as nb FROM aParticipe A, evenement E WHERE A.idPersonne=? AND A.idEvenement=E.idEvenement AND (E.date>=now() OR date IS NULL)");
            $req->execute(array($idPers));
            if ($result=$req->fetch()) {
               return $result['nb'];
            }else{
                return 0;
            }
            return $lst;
        } catch(PDOException $e) {
            die('error getAParticipePost a etudie '.$e->getMessage().'<br>');
        }
    }

    public static function create($obj) {
        if(get_class($obj)=="AParticipe") {
            try {
                $req=SPDO::getInstance()->prepare("INSERT INTO `aParticipe`(`idPersonne`, `idEvenement`) VALUES (?,?)");
                $req->execute(array($obj->getAncien()->getId(), $obj->getEvenement()->getId()));
            } catch(PDOException $e) {
                die('Error create aParticipe '.$e->getMessage().'<br>');
            }
        } else {
            die('Create AParticipeDAO : paramètre de type aParticipe requis'.get_class($obj));
        }
    }

    public static function delete($obj) {
        if(get_class($obj)=="AParticipe") {
            try {
                $req=SPDO::getInstance()->prepare("DELETE FROM `aParticipe` WHERE `idPersonne`=? AND `idEvenement`=?");
                $req->execute(array($obj->getAncien()->getId(), $obj->getEvenement()->getId()));
            } catch(PDOException $e) {
                die('Error delete aParticipe '.$e->getMessage().'<br>');
            }
        } else {
            die('Delete AParticipeDAO : paramètre de type aParticipe requis'.get_class($obj));
        }
    }

}
?>
