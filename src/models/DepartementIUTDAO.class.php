<?php
    require_once("config.inc.php");
    require_once(CONTROLLERS_INC.'dbConnection.inc.php');
    require_once(MODELS_INC.'DepartementIUT.class.php');

    class DepartementIUTDAO{
        public function getAll(){
            $lst=array();
            try{
                $bdd=connect();
                $req=$bdd->query("SELECT * FROM departementIUT ORDER BY nom");
                while($res=$req->fetch()){
                    $lst[]=new DepartementIUT($res['idDepartement'], $res['nom']);
                }
            }catch (PDOException $e) {
                die("Error getall dpt() !: " . $e->getMessage() . "<br/>");
            }
            return $lst;
        }

        public function getById($id){
            $dpt=null;
            try{
                $bdd=connect();
                $req=$bdd->prepare("SELECT * FROM departementIUT WHERE idDepartement=?");
                $req->execute(array($id));
                if($res=$req->fetch()){
                    $dpt=new DepartementIUT($res['idDepartement'], $res['nom']);
                }
            }catch (PDOException $e) {
                die("Error get by id dpt() !: " . $e->getMessage() . "<br/>");
            }
            return $dpt;
        }

        public function update($dpt){
            try{
                $bdd=connect();
                $req=$bdd->prepare("UPDATE `departementIUT` SET `nom`=? WHERE `idDepartement`=?");
                $req->execute(array($dpt->getNom(),$dpt->getId()));
            }catch (PDOException $e) {
                die("Error update dpt() !: " . $e->getMessage() . "<br/>");
            }
        }

        public function delete($dpt){
            try{
                $bdd=connect();
                $req=$bdd->prepare("DELETE FROM `departementIUT` WHERE `idDepartement`=?");
                $req->execute(array($dpt->getId()));
            }catch (PDOException $e) {
                die("Error delete dpt() !: " . $e->getMessage() . "<br/>");
            }
        }
    }
?>
