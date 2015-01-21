<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$diplAncien = AEtudieDAO::getByAncien($ancien);
		$diplomes = DiplomePostDUTDAO::getDiplomePostDutNotHave($ancien);
		$etablissements = EtablissementDAO::getAll();
		if (isset($_POST) && $_POST != NULL) {
			var_dump($_POST);
		}
	}
	include(VIEWS_INC.'diplome-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}

?>