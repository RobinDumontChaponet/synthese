<?php
    require_once("includes/dbConnection.inc.php");
    require_once("models/Page.class.php");

    class PageDAO{

        public static function getAll(){
            $bdd=connect();
            $req=$bdd->query("SELECT `idPage`, `libelle` FROM `page` ORDER BY libelle");
            $lst=$req->fetchAll();
            $lstObj=array();
            foreach($lst as $page){
                $lstObj[]=new Page($page['idPage'], $page['libelle']);
            }
            return $lstObj;
        }

        public static function getById($id){

                $bdd=connect();
                $req=$bdd->prepare("SELECT `idPage`, `libelle` FROM `page` WHERE idPage=?");
                $req->execute(array($id));
                $page=$req->fetch();
                return new Page($page['idDroit'], $page['libelle']);;

        }

        public static function create($page){
            if(gettype($page)=="Page"){
                $bdd->connect();
                $req=$bdd->prepare("INSERT INTO `page`(`libelle`) VALUES (?)");
                $req->execute(array($page->getLibelle()));
                return $bdd->LastInsertId();
            }
        }

        public static function update($page){
            if(gettype($page)=="Page"){
                $bdd->connect();
                $req=$bdd->prepare("UPDATE `page` SET `libelle`=? WHERE `idPage`=?");
                $req->execute(array($page->getLibelle(),$page->getId()));
            }
        }

        public static function delete($page){
             if(gettype($page)=="Page"){
                $bdd->connect();
                $req=$bdd->prepare("DELETE FROM `page` WHERE `idPage`=?");
                 $req->execute(array($page->getId()));
             }
        }

    }
?>
