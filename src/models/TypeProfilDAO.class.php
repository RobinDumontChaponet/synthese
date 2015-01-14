<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."TypeProfil.class.php");

class TypeProfilDAO
{

    public static function getAll()
    {
        try{
            $req=SPDO::getInstance()->query("SELECT `idProfil`, `libelle` FROM `typeProfil` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstposte=array();
            foreach
                ($lst as $poste)
            {
                $lstposte[]=new TypeProfil($poste['idProfil'], $poste['libelle']);
            }
            return $lstposte;
        }catch (PDOException $e)
        {
            die("Error get all TypeProfil !: " . $e->getMessage() . "<br/>");
        }
    }

    public static function getById($id)
    {
        try{
            $req=SPDO::getInstance()->prepare("SELECT `idProfil`, `libelle` FROM `typeProfil` WHERE idProfil=?");
            $req->execute(array($id));
            if
                ($poste=$req->fetch())
            {
                return new TypeProfil($poste['idProfil'], $poste['libelle']);
            }else
            {
                return null;
            }
        }catch (PDOException $e)
        {
            die("Error get id TypeProfil !: " . $e->getMessage() . "<br/>");
        }

    }

    public static function create(&$poste)
    {
        if
            (get_class($poste)=="TypeProfil")
        {
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `typeProfil`(`libelle`) VALUES (?)");
                $req->execute(array($poste->getLibelle()));
                $poste->setId($bdd->LastInsertId());
                return $poste->getId();
            }catch (PDOException $e)
            {
                die("Error create TypeProfil !: " . $e->getMessage() . "<br/>");
            }
        }else
        {
            die('argument de type TypeProfil demandé');
        }
    }

    public static function update($poste)
    {
        if
            (get_class($poste)=="TypeProfil")
        {
            $req=SPDO::getInstance()->prepare("UPDATE `typeProfil` SET `libelle`=? WHERE `idProfil`=?");
            $req->execute(array($poste->getLibelle(), $poste->getId()));
        }
    }

    public static function delete($poste)
    {
        if
            (get_class($poste)=="TypeProfil")
        {
            try{
                $req=SPDO::getInstance()->prepare("DELETE FROM `typeProfil` WHERE `idProfil`=?");
                $req->execute(array($poste->getId()));
            }catch (PDOException $e)
            {
                die("Error delete TypeProfil !: " . $e->getMessage() . "<br/>");
            }
        }else
        {
            die('argument de type TypeProfil demandé');
        }
    }

}
?>
