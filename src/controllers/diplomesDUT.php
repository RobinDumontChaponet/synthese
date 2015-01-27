<?php
if ($_SESSION['user_auth']['write']) {
	require_once(MODELS_INC."DiplomeDUTDAO.class.php");

	$diplomesDUT = DiplomeDUTDAO::getAll();

	include(VIEWS_INC.'diplomesDUT.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>
