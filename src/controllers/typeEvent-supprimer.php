<?php
if ($_SESSION['user_auth']['write']) {
	require_once(MODELS_INC."TypeEvenementDAO.class.php");

	if ($_GET['id'] && $_SESSION['user_auth']['write']) {
		$typeEvent = new TypeEvenement($_GET['id'], NULL);
		TypeEvenementDAO::delete($typeEvent);
		header('Location: '.SELF.'typesEvent');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>