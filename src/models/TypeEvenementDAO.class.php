<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."TypeEvenement.class.php");

class TypeEvenementDAO
{

	public static function getAll()
	{
		try{
			$req=SPDO::getInstance()->query("SELECT `idTypeEvenement`, `libelle` FROM `typeEvenement` ORDER BY libelle");
			$lst=$req->fetchAll();
			$lsttype=array();
			foreach
			($lst as $type)
			{
				$lsttype[]=new TypeEvenement($type['idTypeEvenement'], $type['libelle']);
			}
			return $lsttype;
		}catch (PDOException $e)
		{
			die("Error get all type event !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function getById($id)
	{
		try{
			$req=SPDO::getInstance()->prepare("SELECT `idTypeEvenement`, `libelle` FROM `typeEvenement` WHERE idTypeEvenement=?");
			$req->execute(array($id));
			$type=$req->fetch();
			return new TypeEvenement($type['idTypeEvenement'], $type['libelle']);
		}catch (PDOException $e)
		{
			die("Error get id type event !: " . $e->getMessage() . "<br/>");
		}
	}

	public static function create(&$type) {
		if (get_class($type) == "TypeEvenement") {
			try{
				$req = $bdd->prepare("INSERT INTO `typeEvenement`(`libelle`) VALUES (?)");
				$req->execute(array($type->getLibelle()));
				$type->setId(SPDO::getInstance()->LastInsertId());
                return $type->getId();
			} catch (PDOException $e) {
				die("Error create type event !: " . $e->getMessage() . "<br/>");
			}
		} else {
			die('argument de type type event demandé');
		}
	}

	public static function update($type) {
		if (get_class($type) == "TypeEvenement") {
			try{
				$req = SPDO::getInstance()->prepare("UPDATE `typeEvenement` SET `libelle`=? WHERE `idTypeEvenement`=?");
				$req->execute(array($type->getLibelle(), $type->getId()));
			} catch (PDOException $e) {
				die("Error update type event !: " . $e->getMessage() . "<br/>");
			}
		}else {
			die('argument de type type event demandé');
		}
	}

	public static function delete($type) {
		if (get_class($type) == "TypeEvenement") {
			try{
				$req = SPDO::getInstance()->prepare("DELETE FROM `typeEvenement` WHERE `idTypeEvenement`=?");
				$req->execute(array($type->getId()));
			} catch (PDOException $e) {
				die("Error delete type event !: " . $e->getMessage() . "<br/>");
			}
		} else {
			die('argument de type type event demandé');
		}
	}
}
?>
