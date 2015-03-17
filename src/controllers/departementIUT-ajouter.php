<?php
if ($_SESSION['user_auth']['write']) {
	if($_POST) {
		if ($_POST['nom'] != NULL && $_POST['sigle']) {
			/*$words = preg_split("/\s+/", $_POST['nom']);	En cas où on veut la première lettre du sigle
			$acronym = "";
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$departementIUT = new DepartementIUT (0, $_POST['nom'], $acronym);
			*/
			$departementIUT = new DepartementIUT (0, $_POST['nom'], $_POST['sigle']);
			DepartementIUTDAO::create($departementIUT);
			header('Location: '.SELF.'departementsIUT'); // Faire en sorte par la suite de pouvoir revenir aux pages précédentes
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'departementIUT-ajouter.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>