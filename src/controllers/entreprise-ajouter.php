<?php

$codesAPE = CodeAPEDAO::getAll();
$libelleTypeProfil = $_SESSION['syntheseUser']->getTypeProfil()->getLibelle();

if (isset($_POST) && $_POST != NULL) {
	if ($_POST['name'] != NULL) {
		var_dump($_POST['name']);
		$valid = true;
	}
	if ($_POST['address1'] != NULL) {
		var_dump($_POST['address1']);
		$valid = true;
	} else {

	}

	if ($valid) {
		//$entreprise = new Entreprise(0, $_POST['name']);
		//EntrepriseDAO::update($entreprise);
	}
}

include(VIEWS_INC.'entreprise-ajouter.php');

?>