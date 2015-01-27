<?php
if ($_SESSION['user_auth']['write']) {
	require_once(MODELS_INC."CommentaireDAO.class.php");

	if ($_GET['id']) {
		$com = CommentaireDAO::getById($_GET['id']);
		CommentaireDAO::delete($com);
		header('Location: '.SELF.'article/'.$com->getPost());
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>