<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id'] != NULL) {
		$domaine = DomaineDAO::getById($_GET['id']);
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['libelle'] != NULL && $_POST['description'] != NULL) {
				$newDomaine = new Domaine($_GET['id'], $_POST['libelle'], $_POST['description']);
				DomaineDAO::update($newDomaine);
				header('Location: '.SELF.'domaines');
			} else {
				$error = true;
			}
		}
	} else {
		$noId = true;
	}
	
	include(VIEWS_INC.'domaine-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>