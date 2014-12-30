<?php
require_once(MODELS_INC."EvenementDAO.class.php");

if ($_GET['id']) {
	$event = new Evenement($_GET['id'], NULL, NULL, NULL);
	EvenementDAO::delete($event);
	header('Location: '.SELF.'evenements');
}

?>