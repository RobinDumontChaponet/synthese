<?php
include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'PersonneDAO.class.php');

if (isset($_GET['id']) && $_GET['id'] != NULL) {
	$personne = PersonneDAO::getById($_GET['id']);
	$ancien = AncienDAO::getById($personne->getId());
	if ($ancien != NULL) {
		$imageProfil = $ancien->getImageProfil();
		
		header('Content-Type: image/jpeg');
		echo $imageProfil;
	} else
		echo 'Aucune image de profil existante pour cet id';

} else {
	echo 'Aucun id n\'a été mit';
}