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
	$diplomeDUT = AEtudieDAO::getByAncien($ancien->getId());
	if ($diplomeDUT == NULL)
		$noDiplomeDUT = 1;
	$diplomePost = PossedeDAO::getByAncien($ancien->getId());
	if ($diplomePost == NULL)
		$noDiplomePost = 1;
	$entreprises = TravailleDAO::getByAncien($ancien->getId());
	if ($entreprises == NULL)
		$noEntreprises = 1;
		
	if ($imageProfil == NULL)
		$noImageProfil = 1;
	if ($imageTrombi == NULL)
		$noImageTrombi = 1;
}

include(VIEWS_INC.'profil.php');
?>
