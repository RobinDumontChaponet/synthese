<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$diplomes = DiplomePostDUTDAO::getDiplomePostDutNotHave($ancien);
		$etablissements = EtablissementDAO::getAll();
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['diplome'] != NULL && $_POST['etablissement'] != NULL ) {
				$etablissement = EtablissementDAO::getById($_POST['etablissement']);
				$diplomePost = DiplomePostDUTDAO::getById($_POST['diplome']);
				if ($etablissement != NULL && $diplomePost != NULL) {
					if ($_POST['periode1'] != NULL && $_POST['periode2'] != NULL) {
						if ($_POST['periode1'] <= $_POST['periode2']) {
							if($_POST['periode1'] >= '1900-01-01') {
								$possede = new Possede($ancien, $etablissement, $diplomePost, $_POST['resultat'], $_POST['periode1'] ,$_POST['periode2']);
								PossedeDAO::create($possede);
								header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#diplomesPostDUT');
							} else {
								$beSerious = true;
							}
						} else {
							$dateSup = true;
						}
					} else {
						$noPeriode = true;
					}
				}
			} else {
				$errorDiplomeEtablissement = true;
			}
		}
	}
	include(VIEWS_INC.'diplome-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}

?>