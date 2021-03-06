<?php

if ($_SESSION['user_auth']['write']) {
	include_once('validate.transit.inc.php');

	function validate ($event) {
		$valid = array();
		if (isset($_POST['nom']) && $_POST['nom'] != $event->getDate())
			$valid['nom'] = true;
		if (isset($_POST['date']) && $_POST['date'] != $event->getDate())
			$valid['date'] = true;
		if (isset($_POST['typeEvent']) && $_POST['typeEvent'] != $event->getTypeEvenement()->getId())
			$valid['typeEvent'] = true;
		if (isset($_POST['commentaire']) && $_POST['commentaire'] != $event->getCommentaire())
			$valid['commentaire'] = true;
		return $valid;
	}

	if (isset($_GET['id']) && $_GET['id'] != NULL) {
		$event = EvenementDAO::getById($_GET['id']);
		if ($event->getTypeEvenement() == NULL) {
			$eventTempo = new TypeEvenement (-1, 'Rhaaa');
			$event->setTypeEvenement($eventTempo);
		}
		$typesEvent = TypeEvenementDAO::getAll();
		if (!empty($_POST) && $event != NULL) {
			$valid = validate($event);
			if ($valid['nom']) {
				$event->setNom($_POST['nom']);
				$change = true;
			}
			if ($valid['date']) {
				$event->setDate($_POST['date']);
				$change = true;
			}
			if ($valid['typeEvent']) {
				$event->getTypeEvenement()->setId($_POST['typeEvent']);
				$change = true;
			}
			if ($valid['commentaire']) {
				$event->setCommentaire($_POST['commentaire']);
				$change = true;
			}
			if ($change)
				EvenementDAO::update($event);
			header('Location: '.SELF.'evenement/'.$event->getId());
		}
	}
	include(VIEWS_INC.'evenement-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>
