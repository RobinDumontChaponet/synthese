<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$entreprise = new Entreprise($_GET['id'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		EntrepriseDAO::delete($entreprise);
		header('Location: '.SELF.'entreprises');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>
