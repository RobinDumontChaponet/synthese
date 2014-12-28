<?php

include_once('validate.transit.inc.php');

$user = $_SESSION[syntheseUser]->getTypeProfil()->getLibelle();
$domaines = DomaineDAO::getAll();
$valid = NULL;
$change = 0;
if (isset($_GET['id']))
	$diplome = DiplomePostDUTDAO::getById($_GET['id']);

function validate ($diplome) {
	$valid = array();
	if (isset($_POST['diplomeLibelle']) && trim($_POST['diplomeLibelle']) != $diplome->getLibelle()) {
		if (!contains_numeric($_POST['diplomeLibelle']))
			$valid['diplomeLibelle'] = true;
		else
			$valid['diplomeLibelle'] = false;
	}
	if (isset($_POST['domainLibelle']) && $_POST['domainLibelle'] != $diplome->getDomaine()->getId()) {
		$valid['domainLibelle'] = true;
	}
	return $valid;
}

if(!empty($_POST) && $diplome != NULL) {
	$valid = validate($diplome);
	if ($valid['diplomeLibelle']) {
		$diplome->setLibelle($_POST['diplomeLibelle']);
		$change = true;
	}
	if ($valid['domainLibelle']) {
		$diplome->getDomaine()->setId($_POST['domainLibelle']);
		var_dump($diplome->getDomaine()->getId());
		$change = true;
	}
	if ($change)
		DiplomePostDUTDAO::update($diplome);
}

include(VIEWS_INC.'diplome.php');

?>