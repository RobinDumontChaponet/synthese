<?php

if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) {
	if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idSpe'] != NULL) {
		$ancien = AncienDAO::getById($_GET['idAncien']);
		$specialisation = SpecialisationDAO::getById($_GET['idSpe']);
		if ($specialisation != NULL) {
			$estSpecialise = new EstSpecialise ($ancien, $specialisation);
			EstSpecialiseDAO::delete($estSpecialise);
		}
		header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#specialisations');
	}
	// include(VIEWS_INC.'403.php');
} else {
	include(VIEWS_INC.'403.php');
}

?>