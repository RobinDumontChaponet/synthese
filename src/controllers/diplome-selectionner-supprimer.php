<?php
$ancien = AncienDAO::getById($_GET['idAncien']);

if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) {
	if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idDiplomePost'] != NULL && $_GET['idEtablissement'] != NULL) {
			$etablissement = EtablissementDAO::getById($_GET['idEtablissement']);
			if ($etablissement != NULL) {
				$diplomePost = DiplomePostDUTDAO::getById($_GET['idDiplomePost']);
				$possede = new Possede ($ancien, $etablissement, $diplomePost, NULL, NULL, NULL);
				PossedeDAO::delete($possede);
			}
		header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#diplomes');
	}
	// include(VIEWS_INC.'403.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>