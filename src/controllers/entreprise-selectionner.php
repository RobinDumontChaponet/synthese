<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		if ($ancien != NULL) {
			$entreprises = EntrepriseDAO::getAll();
		}
		$postes = PosteDAO::getAll();
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['entreprise'] != NULL) {
				if ($_POST['periode1'] != NULL) {
					$entreprise = EntrepriseDAO::getById($_POST['entreprise']);
					$poste = PosteDAO::getById($_POST['poste']);
					if ($poste != NULL) {
						if (isset($_POST['periode2']) && !empty($_POST['periode2'])) {
							if ($_POST['periode1'] <= $_POST['periode2']) {
								if($_POST['periode1'] >= '1900-01-01') {
									$travaille = new Travaille($entreprise, $poste, $ancien, $_POST['periode1'], $_POST['periode2']);
									TravailleDAO::create($travaille);
									header('Location: '.SELF.'profil/'.$ancien->getId().'#entreprise');
								} else {
									$beSerious = true;
								}
							} else
								$errorPeriodes = true;
						} else {
							$travaille = new Travaille($entreprise, $poste, $ancien, $_POST['periode1'], $_POST['periode2']);
							TravailleDAO::create($travaille);
							header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#entreprise');
						}
					} else {
						$errorPoste = true;
					}
				} else {
					$errorPeriode1 = true;
				}
			} else {
				$errorEntreprise = true;
			}
		}
	}
	include(VIEWS_INC.'entreprise-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}

?>