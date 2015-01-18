<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$diplomesDUT = DiplomeDUTDAO::getDiplomeDutNotHave($ancien);
		var_dump($diplomesDUT);
		// $diplAncien = new AEtudie ($ancien, $diplomeDUT, $departementIUT, $promotion);
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['diplome']) {
				$diplAncien->getDiplomeDUT()->setId($_POST['diplome']);
				//AEtudieDAO::create($diplAncien);
			}
		}
	}
	include(VIEWS_INC.'diplomeDUT-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>