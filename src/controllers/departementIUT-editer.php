<?php
if ($_SESSION['user_auth']['write'] && $_GET['id'] != NULL ) {
	$departementIUT = DepartementIUTDAO::getById($_GET['id']);
	if($_POST && isset($_GET['id'])) {
		if ($_POST['nom'] != NULL && $_POST['sigle'] != NULL) {
			/*$words = preg_split("/\s+/", $_POST['nom']);	En cas où on veut la première lettre du sigle
			$acronym = "";
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$departementIUT = new DepartementIUT (0, $_POST['nom'], $acronym);
			*/
			$departementIUT->setNom($_POST['nom']);
			$departementIUT->setSigle($_POST['sigle']);
			DepartementIUTDAO::update($departementIUT);
			header('Location: '.SELF.'departementsIUT'); // Faire en sorte par la suite de pouvoir revenir aux pages précédentes
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'departementIUT-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>