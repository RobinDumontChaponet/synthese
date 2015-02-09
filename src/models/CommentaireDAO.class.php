<?php
    
    require_once("SPDO.class.php");
    require_once(MODELS_INC."Commentaire.class.php");
    require_once(MODELS_INC."PersonneDAO.class.php");
    require_once(MODELS_INC."PostDAO.class.php");

    class CommentaireDAO{
        
        public static function getAll(){
            $lst=array();
            try{
                $req=SPDO::getInstance()->query("SELECT * FROM `commentaires` ORDER BY date DESC");
                while($res=$req->fetch()){
                    $pers=PersonneDAO::getById($res['idPersonne']);
                    $lst[]=new Commentaire($res['idCom'],$pers,$res['idPost'],$res['date'],$res['contenu']);
                }
            }catch(PDOException $e){
                die('Erreur sql CommentaireDAO getAll');   
            }
            return $lst;
        }
        
        public static function getByIdPost($id){
            $lst=array();
            try{
                $req=SPDO::getInstance()->prepare("SELECT * FROM `commentaires` WHERE idPost=? ORDER BY date DESC");
                $req->execute(array($id));
                while($res=$req->fetch()){
                    $pers=PersonneDAO::getById($res['idPersonne']);
                    $lst[]=new Commentaire($res['idCom'],$pers,$res['idPost'],$res['date'],$res['contenu']);
                }
            }catch(PDOException $e){
                die('Erreur sql CommentaireDAO getAll');   
            }
            return $lst;
        }
        
        public static function getById($id){
            try{
                $req=SPDO::getInstance()->prepare("SELECT * FROM `commentaires` WHERE idCom=?");
                $req->execute(array($id));
                if($res=$req->fetch()){
                    $pers=PersonneDAO::getById($res['idPersonne']);
                    return new Commentaire($res['idCom'],$pers,$res['idPost'],$res['date'],$res['contenu']);
                }else{
                    return null;   
                }
            }catch(PDOException $e){
                die('Erreur sql CommentaireDAO getById');   
            }
        }
        
        public static function update($obj){
            if(get_class($obj)=="Commentaire"){
                try{
                    $req=SPDO::getInstance()->prepare("UPDATE `commentaires` SET `idPersonne`=?,`idPost`=?,`date`=?,`contenu`=? WHERE `idCom`=?");
                    $req->execute(array($obj->getPers()->getId(),$obj->getPost(),$obj->getDate(),$obj->getContenu(),$obj->getId()));
                }catch(PDOException $e){
                    die('Erreur sql CommentaireDAO update');    
                }
            }else{
                die('erreur type update CommentaireDAO');   
            }
        }
        
        public static function create(&$obj){
            if(get_class($obj)=="Commentaire"){
                try{
                    $req=SPDO::getInstance()->prepare("INSERT INTO `commentaires`(`idPersonne`, `idPost`, `date`, `contenu`) VALUES (?,?,?,?)");
                    $req->execute(array($obj->getPers()->getId(),$obj->getPost(),$obj->getDate(),$obj->getContenu()));
                    $id=SPDO::getInstance()->lastInsertId();
                    $obj->setId($id);
                    return $id;
                }catch(PDOException $e){
                    die('Erreur sql CommentaireDAO create');    
                }
            }else{
                die('erreur type create CommentaireDAO');   
            }
        }
        
        public static function delete($obj){
            if(get_class($obj)=="Commentaire"){
                try{
                    $req=SPDO::getInstance()->prepare("DELETE FROM `commentaires` WHERE `idCom`=?");
                    $req->execute(array($obj->getId()));
                }catch(PDOException $e){
                    die('Erreur sql CommentaireDAO delete');    
                }
            }else{
                die('erreur type delete CommentaireDAO');   
            }
        }
        
        
        
    }
?>