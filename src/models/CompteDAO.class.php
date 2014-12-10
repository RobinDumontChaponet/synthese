<?php
require_once("includes/dbConnection.inc.php");
require_once("includes/Compte.class.php");
require_once("includes/PersonneDAO.class.php");

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
                        $Personne=PersonneDAO::getById($res->idPersonne());
                        $compte=new Compte($res->idCompte, $res->idProfil, $Personne, $res->ndc, $res->mdp);
                    }

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
