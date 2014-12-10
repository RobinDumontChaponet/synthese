<?php
require_once("includes/dbConnection.inc.php");
require_once("models/Personne.class.php");

class PersonneDAO
{

	public static function getAll()
	{
		$bdd=connect();
		$req=$bdd->query("SELECT `idPersonne`, `idCompte`, `nomUsage`, `nomPatronymique`, `mail`, `prenom` FROM `personne` ORDER BY nomUsage");
		$lst=$req->fetchAll();
		$lstObjet=array();
		foreach ($lst as $pers)
		{
			$lstObjet[]=new Personne($pers['idPersonne'], $pers['nomUsage'], $pers['nomPatronymique'], $pers['prenom'], $pers['mail']);
		}
		return $lstObjet;
	}

	public static function getById($id)
	{
		if (is_numeric($id))
		{
			$bdd=connect();
			$statement=$bdd->prepare("SELECT `idPersonne`, `idCompte`, `nomUsage`, `nomPatronymique`, `mail`, `prenom` FROM `personne` WHERE idPersonne=?");
			$statement->execute(array($id));
			$pers=$statement->fetch();
			return new Personne($pers['idPersonne'], $pers['nomUsage'], $pers['nomPatronymique'], $pers['prenom'], $pers['mail']);
		}
	}

	public static function create($pers)
	{
		if (gettype($ancien)=="Personne")
		{
			$bdd=connect();
			$bdd->prepare("INSERT INTO `personne`(`nomUsage`, `nomPatronymique`, `mail`, `prenom`) VALUES (?,?,?,?)");
			$bdd->execute(array($pers->getNom(), $pers->getNomPatronymique(), $pers->getMail(), $pers->getPrenom()));
			return $bdd->LastInsertId();
		}
	}

	public static function delete($pers)
	{
		if (gettype($ancien)=="Personne")
		{
			$bdd=connect();
			$bdd->prepare("DELETE FROM `personne` WHERE `idPersonne`=?");
			$bdd->execute(array($pers->getId()));
		}
	}

	public static function update($pers)
	{
		if (gettype($ancien)=="Personne")
		{
			$bdd=connect();
			$bdd->prepare("UPDATE `personne` SET `nomUsage`=?,`nomPatronymique`=?,`mail`=?,`prenom`=? WHERE `idPersonne`=?");
			$bdd->execute(array($pers->getNom(), $pers->getNomPatronymique(), $pers->getMail(), $pers->getPrenom(), $pers->getId()));
		}
	}

}
?>