<?php
require_once(MODELS_INC."TypeEvenementDAO.class.php");

if($_POST) {
	if ($_POST['libelle'] != NULL) {
		$typeEvent = new TypeEvenement(0, $_POST['libelle']);
		TypeEvenementDAO::create($typeEvent);
	}
	header('Location: '.SELF.'typesEvent');
}

include(VIEWS_INC.'typeEvent-ajouter.php');
?>