<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Compte.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");
require_once(MODELS_INC."TypeProfilDAO.class.php");

class CompteDAO
{
    public static function getCompteByNdc($ndc)
    {
        $compte = NULL;
        try {
            $statement = SPDO::getInstance()->prepare("SELECT * FROM compte WHERE ndc=?");
            $statement->bindParam(1, $ndc);
            $statement->execute();
            if ($res = $statement->fetch())
            {
                //var_dump($res);
                $personne=PersonneDAO::getById($res['idPersonne']);
                $typeProfil=TypeProfilDAO::getById($res['idProfil']);
                $compte=new Compte($res['idCompte'], $typeProfil, $personne, $res['ndc'], $res['mdp']);
            }else{
                return null;
            }
        } catch (PDOException $e) {
            die("Error getCompteByNdc() !: " . $e->getMessage() . "<br/>");
        }
        return $compte;
    }
    public static function getAll()
    {
        $lstCompte=array();
        try {
            $req=SPDO::getInstance()->query("SELECT * FROM compte ORDER BY ndc");
            while ($res=$req->fetch(PDO::FETCH_OBJ))
            {
                $personne=PersonneDAO::getById($res->idPersonne);
                $typeProfil=TypeProfilDAO::getById($res->idProfil);
                $lstCompte[]=new Compte($res->idCompte, $typeProfil, $personne, $res->ndc, $res->mdp);
            }
        } catch (PDOException $e) {
            die("Error getAll() !: " . $e->getMessage() . "<br/>");
        }
        return $lstCompte;
    }
    public static function getById($id)
    {
        $compte = NULL;
        try {
            $statement = SPDO::getInstance()->prepare("SELECT * FROM compte WHERE idCompte=?");
            $statement->execute(array($id));
            if ($res = $statement->fetch(PDO::FETCH_OBJ))
            {
                $Personne=PersonneDAO::getById($res->idPersonne);
                $typeProfil=TypeProfilDAO::getById($res->idProfil);
                $compte=new Compte($res->idCompte, $typeProfil, $Personne, $res->ndc, $res->mdp);
            }
        } catch (PDOException $e) {
            die("Error getCompteById() !: " . $e->getMessage() . "<br/>");
        }
        return $compte;
    }

    public static function create(&$obj){
        if(gettype($obj)=="Compte"){
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `compte`(`idProfil`, `idPersonne`, `ndc`, `mdp`) VALUES (?,?,?,?)");
                $req->execute(array($obj->getTypeProfil(),$obj->getPersonne(),$obj->getNdc(),$obj->getMdp));
                $obj->setId(SPDO::getInstance()->lastInsertId());
                return $obj->getId();
            }catch(PDOException $e){
                die('error create comptedao '.$e->getMessage().'<br>');
            }
        }
    }

    public static function update($compte)
    {
        try {
            $req=SPDO::getInstance()->prepare("UPDATE `compte` SET `idProfil`=?,`idPersonne`=?,`ndc`=?,`mdp`=? WHERE `idCompte`=?");
            $req->execute(array($compte->getTypeProfil()->getId(), $compte->getPersonne()->getId(), $compte->getMdp(), $compte->getId()));
        } catch (PDOException $e) {
            die("Error update() !: " . $e->getMessage() . "<br/>");
        }
    }
    public static function delete($compte)
    {
        try{
            $req=SPDO::getInstance()->prepare("DELETE FROM `compte` WHERE `idCompte`=?");
            $req->execute(array($compte->getId()));
        } catch (PDOException $e) {
            die("Error delete() !: " . $e->getMessage() . "<br/>");
        }
    }
}
?>