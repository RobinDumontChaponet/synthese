<?php
require_once(MODELS_INC."TypeEvenementDAO.class.php");

if ($_GET['id']) {
	$typeEvent = new TypeEvenement($_GET['id'], NULL);
	TypeEvenementDAO::delete($typeEvent);
	header('Location: '.SELF.'typesEvent');
}

?>