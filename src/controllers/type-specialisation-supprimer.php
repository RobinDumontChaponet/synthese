<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$typeSpe = TypeSpecialisationDAO::getById($_GET['id']);
		TypeSpecialisationDAO::delete($typeSpe);
		header('Location: '.SELF.'types-specialisation');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>