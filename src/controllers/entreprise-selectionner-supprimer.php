<?php 
if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) {
	if (isset($_GET) && $_GET['idEntreprise'] != NULL && $_GET['idAncien'] != NULL && $_GET['idPoste'] != NULL) {
		$ancien = new Ancien($_GET['idAncien'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		$entreprise = EntrepriseDAO::getById($_GET['idEntreprise']);
		$poste = PosteDAO::getById($_GET['idPoste']);
		if($entreprise != NULL && $poste != NULL) {
			$travaille = new Travaille($entreprise, $poste, $ancien, $_GET['dateDebut'], NULL);
			TravailleDAO::delete($travaille);
		}
		header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#entreprises');
	}
	include(VIEWS_INC.'entreprises.php');
} else {
	include(VIEWS_INC.'entreprises.php');
}

?>