<?php
require_once(MODELS_INC."EvenementDAO.class.php");

$typesEvent = TypeEvenementDAO::getAll();

if($_POST) {
	if ($_POST['date'] == '')
		$_POST['date'] = NULL;
	$typeEvent = new TypeEvenement($_POST['typeEvent'], NULL);
	$event = new Evenement(0, $typeEvent, $_POST['date'], $_POST['commentaire']);
	EvenementDAO::create($event);
	header('Location: '.SELF.'evenements');
}
include(VIEWS_INC.'evenement-ajouter.php');
?>