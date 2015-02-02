<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id'] != NULL) {
		$poste = PosteDAO::getById($_GET['id']);
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['poste'] != NULL) {
				$poste->setLibelle($_POST['poste']);
				PosteDAO::update($poste);
				header('Location: '.SELF.'postes');
			} else {
				$error = true;
			}
		}
	} else {
		$noId = true;
	}
	
	include(VIEWS_INC.'poste-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>