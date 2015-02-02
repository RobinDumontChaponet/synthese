<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$diplome = DiplomePostDUTDAO::getById($_GET['id']);
		DiplomePostDUTDAO::delete($diplome);
		header('Location: '.SELF.'diplomes');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>
