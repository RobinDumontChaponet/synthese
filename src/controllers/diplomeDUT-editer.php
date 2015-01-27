<?php
if ($_SESSION['user_auth']['write']) {

	if ($_GET['id'] != NULL) {
		$diplomeDUT = DiplomeDUTDAO::getById($_GET['id']);
		$departementsIUT = DepartementIUTDAO::getAll();
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['libelle'] != NULL && $_POST['departementIUT'] != NULL) {
				$departement = DepartementIUTDAO::getById($_POST['departementIUT']);
				$newDiplomeDUT = new DiplomeDUT($_GET['id'], $_POST['libelle'], $departement);
				DiplomeDUTDAO::update($newDiplomeDUT);
				header('Location: '.SELF.'diplomesDUT');
			} else if ($_POST != NULL && $_POST['libelle'] == NULL || $_POST['departementIUT'] == NULL){
				$error = true;
			}
		}
	}

	include(VIEWS_INC.'diplomeDUT-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>
