<?php

if ($_GET['id'] != NULL)
	$typeEvent = TypeEvenementDAO::getById($_GET['id']);

include(VIEWS_INC.'typeEvent-editer.php');

?>