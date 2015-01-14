<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$diplomesDUT = DiplomeDUTDAO::getAll();
		$diplAncien = AEtudieDAO::getByAncien($ancien);
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['diplome'] != $diplAncien->getDiplomeDUT()->getId()) {
				$diplAncien->getDiplomeDUT()->setId($_POST['diplome']);
				//AEtudieDAO::update($diplAncien);
			}
		}
	}
	include(VIEWS_INC.'diplomeDUT-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>