<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."Droit.class.php");

class DroitDAO
{

    public static function getAll()
    {
        try{
            $req=SPDO::getInstance()->query("SELECT `idDroit`, `libelle` FROM `droits` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstObj=array();
            foreach
                ($lst as $droit)
            {
                $lstObj[]=new Droit($droit['idDroit'], $droit['libelle']);
            }
            return $lstObj;
        }catch(PDOException $e)
        {
            die('error get all droit '.$e.'<br>');
        }
    }

    public static function getById($id)
    {
        try{
            $req=SPDO::getInstance()->prepare("SELECT `idDroit`, `libelle` FROM `droits` WHERE idDroit=?");
            $req->execute(array($id));
            if($droit=$req->fetch()){
                return new Droit($droit['idDroit'], $droit['libelle']);
            }else{
                return null;
            }
        }catch(PDOException $e)
        {
            die('error get id droit '.$e->getMessage().'<br>');
        }

    }

    public static function create(&$droit)
    {
        if
            (get_class($droit)=="Droit")
        {
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `droits`(`libelle`) VALUES (?)");
                $req->execute(array($droit->getLibelle()));
                $droit->setId(SPDO::getInstance()->LastInsertId());
                return $droit->getId();
            }catch(PDOException $e)
            {
                die('error create droit '.$e->getMessage().'<br>');
            }
        }else
        {
            die('paramètre de type droit demandé');
        }
    }

    public static function update($droit)
    {
        if(get_class($droit)=="Droit"){
            try{
                $req=SPDO::getInstance()->prepare("UPDATE `droits` SET `libelle`=? WHERE `idDroit`=?");
                $req->execute(array($droit->getLibelle(), $droit->getId()));
            }catch(PDOException $e)
            {
                die('error update droit '.$e->getMessage().'<br>');
            }
        }else
        {
            die('paramètre de type droit demandé');
        }
    }

    public static function delete($droit)
    {
        if
            (get_class($droit)=="Droit")
        {
            try{
                $req=SPDO::getInstance()->prepare("DELETE FROM `droits` WHERE `idDroit`=?");
                $req->execute(array($droit->getId()));
            }catch(PDOException $e)
            {
                die('error delete droit '.$e->getMessage().'<br>');
            }
        }else
        {
            die('paramètre de type droit demandé');
        }
    }

}
?>
