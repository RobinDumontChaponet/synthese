<?php
require_once(dirname(__FILE__).'/../includes/conf.inc.php');
require_once("dbConnection.inc.php");
require_once(MODELS_INC."Personne.class.php");

class PersonneDAO
{

	public static function getAll()
	{
        try{
            $bdd=connect();
            $req=$bdd->query("SELECT `idPersonne`, `nomUsage`, `nomPatronymique`, `mail`, `prenom` FROM `personne` ORDER BY nomUsage");
            $lst=$req->fetchAll();
            $lstObjet=array();
            foreach ($lst as $pers)
            {
                $lstObjet[]=new Personne($pers['idPersonne'], $pers['nomUsage'], $pers['nomPatronymique'], $pers['prenom'], $pers['mail']);
            }
            return $lstObjet;
        }catch(PDOException $e){
            die('error get all personne '.$e->getMessage().'<br>');
        }
	}

	public static function getById($id)
	{
		if (is_numeric($id))
		{
            try{
                $bdd=connect();
                $statement=$bdd->prepare("SELECT `idPersonne`, `nomUsage`, `nomPatronymique`, `mail`, `prenom` FROM `personne` WHERE idPersonne=?");
                $statement->execute(array($id));
                $pers=$statement->fetch();
                return new Personne($pers['idPersonne'], $pers['nomUsage'], $pers['nomPatronymique'], $pers['prenom'], $pers['mail']);
            }catch(PDOException $e){
                die('error get id personne '.$e->getMessage().'<br>');
            }
		}
	}

	public static function create($pers)
	{
		if (gettype($ancien)=="Personne")
		{
            try{
                $bdd=connect();
                $bdd->prepare("INSERT INTO `personne`(`nomUsage`, `nomPatronymique`, `mail`, `prenom`) VALUES (?,?,?,?)");
                $bdd->execute(array($pers->getNom(), $pers->getNomPatronymique(), $pers->getMail(), $pers->getPrenom()));
                return $bdd->LastInsertId();
            }catch(PDOException $e){
                die('error create personne '.$e->getMessage().'<br>');
            }
		}else{
            die('paramètre de type personne demandé');
        }
	}

	public static function delete($pers)
	{
		if (gettype($ancien)=="Personne")
		{
            try{
                $bdd=connect();
                $bdd->prepare("DELETE FROM `personne` WHERE `idPersonne`=?");
                $bdd->execute(array($pers->getId()));
            }catch(PDOException $e){
                die('error delete personne '.$e->getMessage().'<br>');
            }
		}else{
            die('paramètre de type personne demandé');
		}
	}

	public static function update($pers)
	{
		if (gettype($ancien)=="Personne")
		{
            try{
                $bdd=connect();
                $bdd->prepare("UPDATE `personne` SET `nomUsage`=?,`nomPatronymique`=?,`mail`=?,`prenom`=? WHERE `idPersonne`=?");
                $bdd->execute(array($pers->getNom(), $pers->getNomPatronymique(), $pers->getMail(), $pers->getPrenom(), $pers->getId()));
            }catch(PDOException $e){
                die('error update personne '.$e->getMessage().'<br>');
            }
		}else{
            die('paramètre de type personne demandé');
		}
	}

}
?>
