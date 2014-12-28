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
			$valid['diplomeLibelle'] = 1;
		else
			$valid['diplomeLibelle'] = 0;
	}
	if (isset($_POST['domainLibelle']) && $_POST['domainLibelle'] != $diplome->getDomaine()->getId()) {
		$valid['domainLibelle'] = 1;
	}
	return $valid;
}
	
if(!empty($_POST) && $diplome != NULL) {
	$valid = validate($diplome);
	if ($valid['diplomeLibelle']) {
		$diplome->setLibelle($_POST['diplomeLibelle']);
		$change = 1;
	}
	if ($valid['domainLibelle']) {
		$diplome->getDomaine()->setId($_POST['domainLibelle']);
		var_dump($diplome->getDomaine()->getId());
		$change = 1;
	}
	if ($change)
		DiplomePostDUTDAO::update($diplome);
}
	
include(VIEWS_INC.'diplome.php');
?>