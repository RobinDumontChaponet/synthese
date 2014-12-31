<?php
if ($_SESSION['user_auth']['write']) {
	require_once(MODELS_INC."EvenementDAO.class.php");

	if ($_GET['id']) {
		$event = new Evenement($_GET['id'], NULL, NULL, NULL);
		EvenementDAO::delete($event);
		header('Location: '.SELF.'evenements');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>