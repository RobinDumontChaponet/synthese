<?php

if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$ancien = AncienDAO::getById($_GET['id']);
		$spes = EstSpecialiseDAO::getByIdAncienNotHave($_GET['id']);
		if (isset($_POST) && $_POST != NULL) {
			$specSelect = SpecialisationDAO::getById($_POST['specialisation']);
			$specialisation = new EstSpecialise($ancien, $specSelect);
			EstSpecialiseDAO::create($specialisation);
			header('Location: '.SELF.'profil/'.$ancien->getId().'#specialisation');
		}
	}
	include(VIEWS_INC.'specialisation-selectionner.php');
} else {
	include(VIEWS_INC.'403.php');
}

?>