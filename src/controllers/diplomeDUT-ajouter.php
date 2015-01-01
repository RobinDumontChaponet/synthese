<?php
if ($_SESSION['user_auth']['write']) {

	$departementsIUT = DepartementIUTDAO::getAll();
	
	if(isset ($_POST) && $_POST != NULL) {
		if ($_POST['libelle'] != NULL && $_POST['departementIUT'] != NULL) {
			$departement = DepartementIUTDAO::getById($_POST['departementIUT']);
			$diplomeDUT = new DiplomeDUT(0, $_POST['libelle'], $departement);
			DiplomeDUTDAO::create($diplomeDUT);
			header('Location: '.SELF.'diplomesDUT');
		} else if ($_POST != NULL && $_POST['libelle'] == NULL || $_POST['departementIUT'] == NULL){
			$error = true;
		}
	}

	include(VIEWS_INC.'diplomeDUT-ajouter.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>