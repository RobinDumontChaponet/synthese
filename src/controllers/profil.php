<?php

if (isset($_GET['id']))
	$personne = PersonneDAO::getById($_GET['id']);
else
	$personne = PersonneDAO::getById($_SESSION[syntheseUser]->getId());

if ($personne != NULL)
	$ancien = AncienDAO::getById($personne->getId());

if ($ancien != NULL) {
	$imageProfil = $ancien->getImageProfil();
	$imageTrombi = $ancien->getImageTrombi();
	$diplomeDUT = AEtudieDAO::getByAncien($ancien);
	$diplomesPost = PossedeDAO::getByAncien($ancien);
	$entreprises = TravailleDAO::getByAncien($ancien);
}
include(VIEWS_INC.'profil.php');

?>
