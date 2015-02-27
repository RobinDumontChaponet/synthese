<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$specialisation = SpecialisationDAO::getById($_GET['id']);
		SpecialisationDAO::delete($specialisation);
		header('Location: '.SELF.'specialisations');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>