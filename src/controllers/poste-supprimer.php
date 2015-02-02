<?php
if ($_SESSION['user_auth']['write']) {
	if ($_GET['id']) {
		$poste = PosteDAO::getById($_GET['id']);
		PosteDAO::delete($poste);
		header('Location: '.SELF.'postes');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>