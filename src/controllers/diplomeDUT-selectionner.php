<?php
if ($_SESSION['user_auth']['write']) {
	if ($_POST['id']) {
		$ancien = AncienDAO::getById($_POST['id']);
		$diplomesDUT = DiplomeDUTDAO::getAll();
	}
	include(VIEWS_INC.'diplomeDUT-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>