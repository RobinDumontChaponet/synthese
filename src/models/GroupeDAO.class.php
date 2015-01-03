<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Groupe.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");

class GroupeDAO{

    public static function getAll(){
        $lst=array();
        try{
            $req=SPDO::getInstance()->query("SELECT * FROM groupes ORDER BY nom");
            while($res=$req->fetch()){
                $createur=PersonneDAO::getById($res['idCreateur']);
                $lst[]=new Groupe($res['idGroupe'],$res['nom'],$createur,$res['type']);
            }
        }catch(PDOException $e){
            die('Erreur sql groupedao getAll');   
        }
        return $lst;
    }

    public static function getById($id){
        try{
            $req=SPDO::getInstance()->prepare("SELECT * FROM groupes WHERE idGroupe=?");
            $req->execute(array($id));
            if($res=$req->fetch()){
                $createur=PersonneDAO::getById($res['idCreateur']);
                return new Groupe($res['idGroupe'],$res['nom'],$createur,$res['type']);
            }else{
                return null;
            }
        }catch(PDOException $e){
            die('Erreur sql groupedao getById');   
        }
    }

    public static function getGroupeByPersonne($pers){
        if(get_class($pers)=="Personne"){
            $lst=array();
            try{
                $req=SPDO::getInstance()->prepare("SELECT A.idGroupe FROM appartientGroupe A, groupes G WHERE A.idGroupe=G.idGroupe AND idPersonne=? ORDER BY nom");
                $req->execute(array($pers->getId()));
                while($res=$req->fetch()){
                    $lst[]=GroupeDAO::getById($res['idGroupe']);   
                }
                return $lst;
            }catch(PDOException $e){
                die('erreur sql getGroupeByPersonne groupeDAO '.$e->getMessage());   
            }
        }else{
            die('erreur type getGroupeByPersonne groupeDAO');   
        }
    }

    public static function update($obj){
        if(get_class($obj)=="Groupe"){
            try{
                $req=SPDO::getInstance()->prepare("UPDATE `groupes` SET `nom`=?,`idCreateur`=?,`type`=? WHERE `idGroupe`=?");
                $req->execute(array($obj->getNom(),$obj->getCreateur()->getId(),$obj->getType(),$obj->getId()));
            }catch(PDOException $e){
                die('Erreur sql groupedao update');    
            }
        }else{
            die('erreur type update groupedao');   
        }
    }

    public static function create(&$obj){
        if(get_class($obj)=="Groupe"){
            try{
                $req=SPDO::getInstance()->prepare("INSERT INTO `groupes`(`nom`, `idCreateur`, `type`) VALUES (?,?,?)");
                $req->execute(array($obj->getNom(),$obj->getCreateur()->getId(),$obj->getType()));
                $id=SPDO::getInstance()->lastInsertId();
                $obj->setId($id);
                return $id;
            }catch(PDOException $e){
                die('Erreur sql groupedao create');    
            }
        }else{
            die('erreur type create groupedao');   
        }
    }

    public static function delete($obj){
        if(get_class($obj)=="Groupe"){
            try{
                $req=SPDO::getInstance()->prepare("DELETE FROM `groupes` WHERE `idGroupe`=?");
                $req->execute(array($obj->getId()));
            }catch(PDOException $e){
                die('Erreur sql groupedao delete');    
            }
        }else{
            die('erreur type delete groupedao');   
        }
    }



}
?>