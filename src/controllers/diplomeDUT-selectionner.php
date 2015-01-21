<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		if (isset($_POST['promotion']) && $_POST['promotion'] != NULL) {
			$promotion = PromotionDAO::getByAnnee($_POST['promotion']);
			if ($promotion == NULL) {
				echo 'La promotion n\'existe pas';
			} else {
				$valid = true;
			}
		}
		$diplomesDUT = DiplomeDUTDAO::getDiplomeDutNotHave($ancien);
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['diplome']) {
				if ($valid) {
					$diplomeDUT = new DiplomeDUT ($_POST['diplome'][0], NULL, NULL);
					$departementIUT = new DepartementIUT ($_POST['diplome'][1], NULL, NULL);
					$diplAncien = new AEtudie ($ancien, $diplomeDUT, $departementIUT, $promotion);
					AEtudieDAO::create($diplAncien);
				}
				header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#diplomes');
			}
		}
	}
	include(VIEWS_INC.'diplomeDUT-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>