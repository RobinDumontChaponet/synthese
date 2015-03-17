<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$departement = DepartementIUTDAO::getById($_GET['id']);
		DepartementIUTDAO::delete($departement);
		header('Location: '.SELF.'departementsIUT');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>