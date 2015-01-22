<?php
if ($_SESSION['user_auth']['write']) {

	if($_POST) {
		if ($_POST['libelle'] != NULL && $_POST['description'] != NULL) {
			$domaine = new Domaine (0, $_POST['libelle'], $_POST['description']);
			DomaineDAO::create($domaine);
			header('Location: '.SELF.'domaines');
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'domaine-ajouter.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>