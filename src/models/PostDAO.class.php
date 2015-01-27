<?php
require_once("SPDO.class.php");
require_once(MODELS_INC."Post.class.php");
require_once(MODELS_INC."Personne.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");
require_once(MODELS_INC."GroupeDAO.class.php");
require_once(MODELS_INC."CommentaireDAO.class.php");

class PostDAO {

    public static function getById($id) {
        try{
            $req=SPDO::getInstance()->prepare("SELECT * FROM posts WHERE idPost=?");
            $req->execute(array($id));
            if ($res=$req->fetch()) {
                $pers=PersonneDAO::getById($res['idPersonne']);
                if ($res['approuve']==1) { $app=true; }else { $app=false; }
                $coms=CommentaireDAO::getByIdPost($id);
                return new Post($res['idPost'], $pers, $res['date'], $res['contenu'], $app, $coms);
            } else {
                return null;
            }
        } catch(PDOException $e) {
            die('erreur sql PostDAO::getById '.$e->getMessage());
        }
    }

    public static function getByGroupe($gr) {
        if (get_class($gr)=="Groupe") {
            $lst=array();
            try {
                $req=SPDO::getInstance()->prepare("SELECT PO.idPost FROM publieGroupe P, posts PO WHERE P.idGroupe=? AND P.idPost=PO.idPost ORDER BY date DESC");
                $req->execute(array($gr->getId()));
                while ($res=$req->fetch()) {
                    $lst[]=PostDAO::getById($res['idPost']);
                }
                return $lst;
            } catch(PDOException $e) {
                die('erreur sql PostDAO::getByGroupe '.$e->getMessage());
            }
        } else {
            die('erreur type PostDAO::getByGroupe ');
        }
    }

    public static function getAll() {
        $lst=array();
        try {
            $req=SPDO::getInstance()->query("SELECT idPost FROM posts");
            while ($res=$req->fetch()) {
                $lst[]=PostDAO::getById($res['idPost']);
            }
        } catch(PDOException $e) {
            die('erreur sql PostDAO::getAll '.$e->getMessage());
        }
        return $lst;
    }

    public static function create(&$obj) {
        if (get_class($obj)=="Post") {
            try {
                $req=SPDO::getInstance()->prepare("INSERT INTO `posts`(`idPersonne`, `date`, `contenu`,`approuve`) VALUES (?,?,?,?)");
                if ($obj->getApprouve()==true) { $app=1; }else { $app=0; }
                $req->execute(array($obj->getPosteur()->getId(), $obj->getDate(), $obj->getContenu(), $app));
                $id=SPDO::getInstance()->lastInsertId();
                $obj->setId($id);
                return $id;
            } catch(PDOException $e) {
                die('erreur sql PostDAO::create '.$e->getMessage());
            }
        } else {
            die('Erreur type PostDAO::create');
        }
    }

    public static function update($obj) {
        if (get_class($obj)=="Post") {
            try {
                $req=SPDO::getInstance()->prepare("UPDATE `posts` SET `idPersonne`=?,`date`=?,`contenu`=?,`approuve`=? WHERE `idPost`=?");
                if ($obj->getApprouve()==true) { $app=1; }else { $app=0; }
                $req->execute(array($obj->getPosteur()->getId(), $obj->getDate(), $obj->getContenu(), $app, $obj->getId()));
            } catch(PDOException $e) {
                die('erreur sql PostDAO::update '.$e->getMessage());
            }
        }else {
            die('Erreur type PostDAO::update');
        }
    }

    public static function delete($obj) {
        if (get_class($obj)=="Post") {
            try {
                $req=SPDO::getInstance()->prepare("DELETE FROM `posts` WHERE `idPost`=?");
                $req->execute(array($obj->getId()));
                foreach($obj->getComs() as $gr){
                    CommentaireDAO::delete($gr);
                }
            } catch(PDOException $e) {
                die('erreur sql PostDAO::delete '.$e->getMessage());
            }
            try{
                $req=SPDO::getInstance()->prepare("DELETE FROM `publieGroupe` WHERE `idPost`=?");
                $req->execute(array($obj->getId()));
            }catch(PDOException $e){

            }
        } else {
            die('Erreur type PostDAO::delete');
        }
    }

    public static function deleteByGroupe($gr){
        if (get_class($gr)=="Groupe") {
            $lstPost=PostDAO::getByGroupe($gr);
            foreach($lstPost as $post){
                PostDAO::delete($post);
            }
        }else {
            die('Erreur type PostDAO::deleteByGroupe');
        }
    }

    public static function publieGroupe($obj, $groupe) {
        if (get_class($obj)=="Post" && get_class($groupe)=="Groupe") {
            try {
                $req=SPDO::getInstance()->prepare("INSERT INTO `publieGroupe`(`idGroupe`, `idPost`) VALUES (?,?)");
                $req->execute(array($groupe->getId(), $obj->getId()));
            } catch(PDOException $e) {
                die('Erreur sql groupeDAO publieGroupe');
            }
        } else {
            die('erreur type publieGroupe groupeDAO');
        }
    }

    public static function getGroupeByPost($post){
        if (get_class($post)=="Post"){
            try {
                $req=SPDO::getInstance()->prepare("Select * FROM publieGroupe WHERE idPost=?");
                $req->execute(array($post->getId()));
                if($res=$req->fetch()){
                    return GroupeDAO::getById($res['idGroupe']);
                }else{
                    return null;
                }
            } catch(PDOException $e) {
                die('Erreur sql groupeDAO getGroupeByPost');
            }
        }else {
            die('erreur type getGroupeByPost groupeDAO');
        }
    }

}
?>
