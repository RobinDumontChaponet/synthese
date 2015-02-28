<?php
if ($_SESSION['user_auth']['write']) {
	$typeSpes = TypeSpecialisationDAO::getAll();
	$spe = SpecialisationDAO::getById($_POST['id']);
	if($_POST) {
		if ($_POST['libelle'] != NULL && $_POST['typeSpe'] != NULL) {
			$typeSpeNew = TypeSpecialisationDAO::getById($_POST['typeSpe']);
			if ($_POST['libelle'] != $spe->getLibelle()) {
				$spe->setLibelle($_POST['libelle']);
				if ($_POST['typeSpe'] != $typeSpeNew->getId()) {
					$spe->setTypeSpecialisation($typeSpeNew);
					SpecialisationDAO::update($specialisation);
					header('Location: '.SELF.'specialisations'); // Faire en sorte par la suite de pouvoir revenir aux pages précédentes
				}
			}
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'specialisation-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>