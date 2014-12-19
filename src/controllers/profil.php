<?php

$personne = PersonneDAO::getById($_SESSION[syntheseUser]->getId());
$ancien = AncienDAO::getById($personne->getId());

/*if ($ancien->getAdresse2() != NULL)
	$adresse2 = 1;*/
/*
*/
include(VIEWS_INC.'profil.php');

?>
