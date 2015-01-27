<?php

if (isset($_GET['id']) && $_GET['id'] != NULL) {
	$event = EvenementDAO::getById($_GET['id']);
	if ($event != NULL)
		$participants = AParticipeDAO::getByIdEvent($event->getId());
}

include(VIEWS_INC.'evenement.php');
?>
