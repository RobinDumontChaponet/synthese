<?php
require_once(MODELS_INC."TypeEvenementDAO.class.php");

if ($_GET['id'] != NULL) {
	$typeEvent = TypeEvenementDAO::getById($_GET['id']);
	if ($_POST != NULL) {
		if(trim($_POST['libelle']) != '' && $_POST['libelle'] != NULL && trim($_POST['libelle']) != $typeEvent->getLibelle()) {
			$typeEvent->setLibelle(trim($_POST['libelle']));
			TypeEvenementDAO::update($typeEvent);
		}
		header('Location: '.SELF.'typesEvent');
	}
}

if ($_SESSION['user_auth']['write'])
	include(VIEWS_INC.'typeEvent-editer.php');
else
	include(VIEWS_INC.'403.php');

?>