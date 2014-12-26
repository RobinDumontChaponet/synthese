<?php
if (isset($_GET['id']))
	$diplome = DiplomePostDUTDAO::getById($_GET['id']);
$user = $_SESSION[syntheseUser]->getTypeProfil()->getLibelle();

include(VIEWS_INC.'diplome.php');
?>