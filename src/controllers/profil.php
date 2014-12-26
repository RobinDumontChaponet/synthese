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
	$diplomesPost = PossedeDAO::getByAncien($ancien->getId());
	foreach($diplomesPost as $diplomePost)		//	Pourquoi j'ai des objets object(DiplomeDUT)#19 wtf ?
		var_dump($diplomePost->getDiplomePostDUT());
	// echo $diplomePost->getDiplomePostDUT->getId()
	$entreprises = TravailleDAO::getByAncien($ancien->getId());
}

include(VIEWS_INC.'profil.php');
?>
