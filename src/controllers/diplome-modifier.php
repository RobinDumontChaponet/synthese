<?php
if ($_GET['idAncien'] != NULL) {
	$ancien = AncienDAO::getById($_GET['idAncien']);
	if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) {
		if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idDiplomePost'] != NULL && $_GET['idEtablissement'] != NULL) {
			$diplomeAncien = DiplomePostDUTDAO::getById($_GET['idDiplomePost']); // Diplomes not have
			$etablissementAncien = EtablissementDAO::getById($_GET['idEtablissement']);
			$etablissements = EtablissementDAO::getAll();
			$diplomes = DiplomePostDUTDAO::getDiplomePostDutNotHave($ancien);
			$possedeAncien = new Possede($ancien, $etablissementAncien, $diplomeAncien, NULL, NULL, NULL);
			$possede = PossedeDAO::getByPossede($possedeAncien);
			if (isset($_POST) && $_POST != NULL) {
				if ($_POST['resultat'] != NULL && $_POST['diplome'] != NULL && $_POST['etablissement'] != NULL) {
					$possede->setResultat($_POST['resultat']);
					$diplPostNew = DiplomePostDUTDAO::getById($_POST['diplome']);
					$possede->setDiplomePostDUT($diplPostNew);
					$etablNew = EtablissementDAO::getById($_POST['etablissement']);
					$possede->setEtablissement($etablNew);
					$possede->setDateDebut($_POST['periode1']);
					if ($_POST['periode2'] == NULL) {
						$possede->setDateFin('0000-00-00');
					} else {
						$possede->setDateFin($_POST['periode2']);
					}
					//PossedeDAO::update($possedeAncien, $possede); // Créer l'update dans le model Possede avec ancien/nouveau pour l'update et décommenter
				}
			}
		//header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#diplomes');
		}
		include(VIEWS_INC.'diplome-modifier.php');
	} 
} else {
	include(VIEWS_INC.'403.php');
}
?>