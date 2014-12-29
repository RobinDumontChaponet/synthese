<?php
include_once('validate.transit.inc.php');

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
	if (isset($_POST['domainDescription']) && $_POST['domainDescription'] != $diplome->getDomaine()->getDescription()) {
		if (!isset($valid['domainLibelle']))
			$valid['domainDescription'] = true;
		else
			$valid['domainDescription'] = false;
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
		$change = true;
	}
	if ($valid['domainDescription']) {
		$diplome->getDomaine()->setDescription($_POST['domainDescription']);
		DomaineDAO::update($diplome->getDomaine());
	}
	
	if ($change) {
		DiplomePostDUTDAO::update($diplome);
		header('Location: '.SELF.'diplome-editer/'.$diplome->getId());
	}
}

include(VIEWS_INC.'diplome-editer.php');

?>