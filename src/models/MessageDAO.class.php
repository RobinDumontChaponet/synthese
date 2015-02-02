<?php

require_once("SPDO.class.php");
require_once(MODELS_INC."Message.class.php");
require_once(MODELS_INC."Personne.class.php");
require_once(MODELS_INC."PersonneDAO.class.php");

class MessageDAO {

	public function getById($id) {

		try {
			//On prepare la requete
			$req = SPDO::getInstance()->prepare('select * from messages where id_message = ?');

			//On l'execute avec les bons arguments
			$req->execute(array($id));

			$m = $req->fetch();

			$ancien_destinataire = PersonneDAO::getById($m['id_ancien_destinataire']);
			$ancien_expediteur = PersonneDAO::getById($m['id_ancien_expediteur']);
			$message = new Message($m['id_message'], $m['date_message'], $ancien_destinataire, $ancien_expediteur, $m['objet'], $m['message'], $m['lu']);

			return $message;
		} catch (PDOException $e) {
			die('error getById message '.$e->getMessage().'<br>');
		}

	}

	public static function envoyer($date, $ancien, $expediteur, $objet, $message) {
		try {
			//On prepare la requete
			$req = SPDO::getInstance()->prepare('insert into messages(date_message, id_ancien_destinataire, id_ancien_expediteur, objet, message, lu) values(?, ?, ?, ?, ?, 0)');

			//On execute la requete avec les bon arguments
			$req->execute(array($date, $ancien->getId(), $expediteur->getId(), $objet, $message));

		} catch(PDOException $e) {
			die('error envoie message '.$e->getMessage().'<br>');
		}
	}


	public static function getMessagesNonLus($id) {
		try {
			$listeMessages = array();

			//On prepare la requete
			$req = SPDO::getInstance()->query('select * from messages where lu = 0 and id_ancien_destinataire = '.$id);

			//On execute la requete avec les bon arguments
			while ($m = $req->fetch()) {
				$ancien_destinataire = PersonneDAO::getById($m['id_ancien_destinataire']);
				$ancien_expediteur = PersonneDAO::getById($m['id_ancien_expediteur']);
				//$id, $anciens, $expediteur, $objet, $message, $lu
				$message = new Message($m['id_message'], $m['date_message'], $ancien_destinataire, $ancien_expediteur, $m['objet'], $m['message'], $m['lu']);
				array_push($listeMessages, $message);
			}

			return $listeMessages;
		} catch(PDOException $e) {
			die('error collecte des messages non lus '.$e->getMessage().'<br>');
		}
	}

	public static function getMessagesLus($id) {
		try {
			$listeMessages = array();

			//On prepare la requete
			$req = SPDO::getInstance()->query('select * from messages where lu = 1 and id_ancien_destinataire = '.$id);

			//On execute la requete avec les bon arguments
			while ($m = $req->fetch()) {
				$ancien_destinataire = PersonneDAO::getById($m['id_ancien_destinataire']);
				$ancien_expediteur = PersonneDAO::getById($m['id_ancien_expediteur']);
				//$id, $anciens, $expediteur, $objet, $message, $lu
				$message = new Message($m['id_message'], $m['date_message'], $ancien_destinataire, $ancien_expediteur, $m['objet'], $m['message'], $m['lu']);
				array_push($listeMessages, $message);
			}

			return $listeMessages;
		} catch(PDOException $e) {
			die('error collecte des messages non lus '.$e->getMessage().'<br>');
		}
	}


	public static function setMessageLu($message) {
		try{
			$req = SPDO::getInstance()->prepare('update messages set lu = 1 where id_message = ?');
			$req->execute(array($message->getId()));
		}catch(PDOException $e) {
			die('Impossible de declarer le message en tant que lu '.$e->getMessage().'<br>');
		}

	}

}

?>
