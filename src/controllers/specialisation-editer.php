<?php
if ($_SESSION['user_auth']['write']) {
	$typeSpes = TypeSpecialisationDAO::getAll();
	$spe = SpecialisationDAO::getById($_GET['id']);
	if($_POST) {
		if ($_POST['libelle'] != NULL && $_POST['typeSpe'] != NULL) {
			$spe->setLibelle($_POST['libelle']);
			$spe->getTypeSpecialisation()->setId($_POST['typeSpe']);
			SpecialisationDAO::update($spe);
			var_dump($spe);
			header('Location: '.SELF.'specialisations'); // Faire en sorte par la suite de pouvoir revenir aux pages précédentes
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'specialisation-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>