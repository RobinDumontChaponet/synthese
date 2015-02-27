<?php
if ($_SESSION['user_auth']['write']) {
	$typeSpes = TypeSpecialisationDAO::getAll();
	if($_POST) {
		if ($_POST['libelle'] != NULL && $_POST['typeSpe'] != NULL) {
			$typeSpeNew = TypeSpecialisationDAO::getById($_POST['typeSpe']);
			$specialisation = new Specialisation (0, $_POST['libelle'], $typeSpeNew);
			SpecialisationDAO::create($specialisation);
			header('Location: '.SELF.'specialisations'); // Faire en sorte par la suite de pouvoir revenir aux pages précédentes
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'specialisation-ajouter.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>