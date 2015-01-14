<?php

require_once(MODELS_INC.'GroupeDAO.class.php');

if($_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) { //si admin :: tous les groupes
	$groupes=GroupeDAO::getAll();
} else {
	$groupes=GroupeDAO::getGroupeByPersonne($_SESSION["syntheseUser"]->getPersonne());
	// A ajouter le groupe pour la promo
}

include(VIEWS_INC.'groupes.php');

?>