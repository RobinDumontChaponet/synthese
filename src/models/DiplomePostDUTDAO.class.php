<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."DomaineDAO.class.php");
require_once(MODELS_INC."DiplomePostDUT.class.php");

class DiplomePostDUTDAO
{

    public static function getAll()
    {
        $lst=array();
        try{
            $req=SPDO::getInstance()->query("SELECT * FROM diplomePostDUT ORDER BY libelle");
            while
                ($res=$req->fetch())
            {
                $dom=DomaineDAO::getById($res['idDomaine']);
                $lst[]=new DiplomePostDUT($res['idDiplomePost'], $res['libelle'], $dom);
            }
        }catch(PDOException $e)
        {
            die('error getall dip post dut '.$e->getMessage().'<br>');
        }
        return $lst;
    }

    public static function getById($id)
    {
        try{
            $req=SPDO::getInstance()->prepare("SELECT * FROM diplomePostDUT WHERE idDiplomePost=?");
            $req->execute(array($id));
            if
                ($res=$req->fetch())
            {
                $dom=DomaineDAO::getById($res['idDomaine']);
                return new DiplomePostDUT($res['idDiplomePost'], $res['libelle'], $dom);
            }else{
                return null;
            }
        }catch(PDOException $e)
        {
            die('error get id dip post dut '.$e->getMessage().'<br>');
            return null;
        }

    }

    public static function create(&$obj)
    {
        if(get_class($obj)=="DiplomePostDUT")
        {
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `diplomePostDUT`(`idDomaine`, `libelle`) VALUES (?,?)");
                $req->execute(array($obj->getDomaine()->getId(), $obj->getLibelle()));
                $obj->setId(SPDO::getInstance()->LastInsertId());
                return $obj->getId();
            }catch(PDOException $e)
            {
                die('error create dip post dut '.$e->getMessage().'<br>');
            }
        }else
        {
            die('paramètre de type diplome post dut requis');
        }
    }

    public static function update($obj) {
        if (get_class($obj)=="DiplomePostDUT") {
            try {
                $req = SPDO::getInstance()->prepare("UPDATE `diplomePostDUT` SET `idDomaine`=?,`libelle`=? WHERE idDiplomePost=?");
                $req->execute(array($obj->getDomaine()->getId(), $obj->getLibelle(), $obj->getId()));
            } catch(PDOException $e) {
                die('error update dip post dut '.$e->getMessage().'<br>');
            }
        } else {
            die('paramètre de type diplome post dut requis');
        }
    }

    public static function delete($obj) {
        if(get_class($obj)=="DiplomePostDUT"){
            try {
                $req=SPDO::getInstance()->prepare("DELETE FROM `diplomePostDUT` WHERE `idDiplomePost`=?");
                $req->execute(array($obj->getId()));
            } catch(PDOException $e) {
                die('error update dip post dut '.$e->getMessage().'<br>');
            }
		} else {
			die('paramètre de type diplome post dut requis');
        }
    }

    public static function getDiplomePostDutNotHave ($ancien) {
        if(get_class($ancien) == "Ancien"){
            try {
                $req = SPDO::getInstance()->prepare("SELECT idDiplomePost FROM diplomePostDUT WHERE idDiplomePost NOT IN (SELECT idDiplomePost FROM possede WHERE idPersonne=?)");
				$req->execute(array($ancien->getId()));
                $lst = array();
                while($res = $req->fetch()){
                    $lst[] = DiplomePostDUTDAO::getById($res['idDiplomePost']);
                }
                return $lst;
            } catch(PDOException $e){
                die('Error getDiplomePostDutNotHave($ancien) dans DiplomePostDUTDAO '.$e->getMessage());
            }
        } else {
            die('Paramètre de type ancien getDiplomePostDutNotHave($ancien) dans DiplomePostDUTDAO');
        }
    }

}
?>
