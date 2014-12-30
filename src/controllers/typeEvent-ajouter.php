<?php
require_once(MODELS_INC."TypeEvenementDAO.class.php");

if($_POST) {
	if (trim($_POST['libelle']) != NULL) {
		$typeEvent = new TypeEvenement(0, trim($_POST['libelle']));
		$id = TypeEvenementDAO::create($typeEvent);
	}
	header('Location: '.SELF.'typesEvent');
}

include(VIEWS_INC.'typeEvent-ajouter.php');
?>