<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$entreprises = EntrepriseDAO::getAll();
		$postes = PosteDAO::getAll();
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['periode1'] != NULL) {
				$entreprise = EntrepriseDAO::getById($_POST['entreprise']);
				$poste = PosteDAO::getById($_POST['poste']);
				if ($_POST['periode2'] =! NULL) {
					$travaille = new Travaille($entreprise, $poste, $ancien, $_POST['periode1'], $_POST['periode2']);
				} else {
					$travaille = new Travaille($entreprise, $poste, $ancien, $_POST['periode1'], NULL);
				}
				var_dump($travaille);
			} else {
				$errorPeriode1 = true;
			}
		}
	}
	include(VIEWS_INC.'entreprise-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}

?>