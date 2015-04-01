<?php
if ($_GET['idAncien'] != NULL) {
	$ancien = AncienDAO::getById($_GET['idAncien']);
	if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) {
		if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idEntreprise'] != NULL && $_GET['idPoste'] != NULL && $_GET['periode1']) {
			$exEntreprise = EntrepriseDAO::getById($_GET['idEntreprise']);
			$entreprises = EntrepriseDAO::getAll();
			$exPoste = PosteDAO::getById($_GET['idPoste']);
			$postes = PosteDAO::getAll();
			if (isset($_POST) && $_POST != NULL) {
				$newEntreprise = EntrepriseDAO::getById($_POST['entreprise']);
				if ($newEntreprise != NULL) {
					$newPoste = PosteDAO::getById($_POST['poste']);
					if ($newPoste != NULL) {
						if ($_POST['periode1'] != NULL) {
							if ($_POST['periode1'] >= '1900-01-01') {
								if ($_POST['periode2'] == NULL || $_POST['periode2'] >= $_POST['periode1']) {
									if ($_GET['periode2'] == 0000-00-00)
										$exTravaille = new Travaille($exEntreprise, $exPoste, $ancien, $_GET['periode1'], '0000-00-00');
									else
										$exTravaille = new Travaille($exEntreprise, $exPoste, $ancien, $_GET['periode1'], $_GET['periode2']);
									if ($_POST['periode2'] == NULL)
										$newTravaille = new Travaille($newEntreprise, $newPoste, $ancien, $_POST['periode1'], '0000-00-00');
									else
										$newTravaille = new Travaille($newEntreprise, $newPoste, $ancien, $_POST['periode1'], $_POST['periode2']);
									TravailleDAO::update($exTravaille, $newTravaille);
									header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#entreprises');
								} else {
									$errorPeriode2 = true;
								}					
							} else {
								$beSerious = true;
							}
						} else {
							$errorPeriode1 = true;
						}
					} else {
						$errorPoste = true;
					}
				} else {
					$errorEntreprise = true;
				}
			}
		}
	}
	include(VIEWS_INC.'entreprise-modifier.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>