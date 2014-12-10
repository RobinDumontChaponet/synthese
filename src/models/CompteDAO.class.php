<?php
require_once("includes/dbConnection.inc.php");
require_once("includes/Compte.class.php");
    class CompteDAO{

        public function getCompteByNdc($ndc)
        {
            $compte = NULL;
            try {
                $connect = connect();
                $statement = $connect->prepare("SELECT * FROM compte WHERE ndc=?");
                $statement->bindParam(1, $ndc);
                $statement->execute();
                    if ($res = $statement->fetch(PDO::FETCH_OBJ)) {
                        $compte=new Compte($res->idCompte, $res->idProfil, null, $res->ndc, $res->mdp);
                    }
                /*if ($res = $statement->fetch(PDO::FETCH_OBJ)) {
                    $statementTwo = $connect->prepare("SELECT * FROM personne WHERE idPersonne=?");
                    $statementTwo->bindParam(1, $res->idPersonne());
                    $statementTwo->execute();
                    if ($resTwo = $statementTwo->fetch(PDO::FETCH_OBJ)) {
                        $compte=new Compte($res->idCompte, $res->idProfil, $resTwo->idPersonne, $res->ndc, $res->mdp);
                    }
                }*/
            } catch (PDOException $e) {
                die("Error getCompteByNdc() !: " . $e->getMessage() . "<br/>");
            }
            return $compte;
        }

        public static function getAll(){

        }

        public static function getById(){

        }

        public static function update(){

        }

        public static function delete(){

        }

    }
?>
