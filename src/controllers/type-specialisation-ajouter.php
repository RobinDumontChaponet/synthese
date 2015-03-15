<?php
if ($_SESSION['user_auth']['write']) {
	if($_POST) {
		if ($_POST['libelle'] != NULL) {

			$newType = new TypeSpecialisation (NULL, $_POST['libelle']);
			var_dump($newType);
			TypeSpecialisationDAO::create($newType);
			header('Location: '.SELF.'types-specialisation'); // Faire en sorte par la suite de pouvoir revenir aux pages précédentes
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'type-specialisation-ajouter.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>