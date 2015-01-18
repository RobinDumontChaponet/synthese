<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$promotion = AEtudieDAO::getPromotionByAncien($ancien);
		$diplomesDUT = DiplomeDUTDAO::getDiplomeDutNotHave($ancien);
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['diplome']) {
				$diplomeDUT = new DiplomeDUT ($_POST['diplome'][0], NULL, NULL);
				$departementIUT = new DepartementIUT ($_POST['diplome'][1], NULL, NULL);
				$diplAncien = new AEtudie ($ancien, $diplomeDUT, $departementIUT, $promotion);
				AEtudieDAO::create($diplAncien);
				header('Location: '.SELF.'profil/'.$ancien->getId());
			}
		}
	}
	include(VIEWS_INC.'diplomeDUT-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>