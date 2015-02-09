<?php
if ($_GET['idAncien'] != NULL) {
	$ancien = AncienDAO::getById($_GET['idAncien']);
	if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) {
		if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idEntreprise'] != NULL && $_GET['idPoste'] != NULL && $_GET['dateDeb']) {
			$entreprise = EntrepriseDAO::getById();
			$entreprises = EntrepriseDAO::getAll();
			$poste = PosteDAO::getById();
			$postes = PosteDAO::getAll();
			if (isset($_POST) && $_POST != NULL) {
				header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#entreprises');
			}
		}
	}

}
include(VIEWS_INC.'entreprise-modifier.php');
}
} else {
	include(VIEWS_INC.'403.php');
}
?>