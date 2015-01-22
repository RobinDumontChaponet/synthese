<?php
if ($_SESSION['user_auth']['write']) {

	if ($_GET['id']) {
		$domaine = new Domaine ($_GET['id'], NULL, NULL);
		DomaineDAO::delete($domaine);
		header('Location: '.SELF.'domaines');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>