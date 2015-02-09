<?php

include_once('validate.transit.inc.php');

$valid = NULL;
$change = false;

if (isset($_GET['id']))
	$personne = PersonneDAO::getById($_GET['id']);
else
	header('Location: '.SELF.'profil/'.$_SESSION["syntheseUser"]->getPersonne()->getId());

if ($personne != NULL){
	$ancien = AncienDAO::getById($personne->getId());
}

if ($ancien != NULL) {
	$imageProfil = $ancien->getImageProfil();
	$imageTrombi = $ancien->getImageTrombi();
	$diplomesDUT = AEtudieDAO::getByAncien($ancien);
	$diplomesPost = PossedeDAO::getByAncien($ancien);
	$entreprises = TravailleDAO::getByAncien($ancien);
	$spes = EstSpecialiseDAO::getByAncien($ancien);
}
include(VIEWS_INC.'profil.php');

?>
