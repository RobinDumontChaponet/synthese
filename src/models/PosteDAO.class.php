<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Poste.class.php");

class PosteDAO
{

    public static function getAll()
    {
        try{
            $req=SPDO::getInstance()->query("SELECT `idPoste`, `libelle` FROM `poste` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstposte=array();
            foreach
                ($lst as $poste)
            {
                $lstposte[]=new Poste($poste['idPoste'], $poste['libelle']);
            }
            return $lstposte;
        }catch (PDOException $e)
        {
            die("Error get all poste !: " . $e->getMessage() . "<br/>");
        }
    }

    public static function getById($id)
    {
        try{
            $req=SPDO::getInstance()->prepare("SELECT `idPoste`, `libelle` FROM `poste` WHERE idPoste=?");
            $req->execute(array($id));
            if($poste=$req->fetch()){
                return new Poste($poste['idPoste'], $poste['libelle']);
            }else{
                return null;
            }
        }catch (PDOException $e)
        {
            die("Error get id poste !: " . $e->getMessage() . "<br/>");
        }

    }

    public static function create(&$poste)
    {
        if(get_class($poste)=="Poste"){
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `poste`(`libelle`) VALUES (?)");
                $req->execute(array($poste->getLibelle()));
                $poste->setId(SPDO::getInstance()->LastInsertId());
                return $poste->getId();
            }catch (PDOException $e)
            {
                die("Error create poste !: " . $e->getMessage() . "<br/>");
            }
        }else
        {
            die('argument de type Poste demandé');
        }
    }

    public static function update($poste)
    {
        if(get_class($poste)=="Poste"){
            $req=SPDO::getInstance()->prepare("UPDATE `poste` SET `libelle`=? WHERE `idPoste`=?");
            $req->execute(array($poste->getLibelle(), $poste->getId()));
        }
    }

    public static function delete($poste)
    {
        if(get_class($poste)=="Poste"){
            try{
                $req=SPDO::getInstance()->prepare("DELETE FROM `poste` WHERE `idPoste`=?");
                $req->execute(array($poste->getId()));
            }catch (PDOException $e)
            {
                die("Error delete poste !: " . $e->getMessage() . "<br/>");
            }
        }else
        {
            die('argument de type Poste demandé');
        }
    }

}
?>
