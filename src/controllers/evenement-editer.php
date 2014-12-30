<?php

if (isset($_GET['id']) && $_GET['id'] != NULL)
	$event = EvenementDAO::getById($_GET['id']);

include(VIEWS_INC.'evenement.php');
?>