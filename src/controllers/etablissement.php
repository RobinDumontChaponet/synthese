<?php
if (isset($_GET['id']))
	$etablissement = EtablissementDAO::getById($_GET['id']);
$user = $_SESSION[syntheseUser]->getTypeProfil()->getLibelle();

include(VIEWS_INC.'etablissement.php');
?>