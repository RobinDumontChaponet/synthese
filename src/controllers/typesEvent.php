<?php
if ($_SESSION['user_auth']['write']) {
	$typesEvent = TypeEvenementDAO::getAll();

	include(VIEWS_INC.'typesEvent.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>
