<?php
include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'PersonneDAO.class.php');

if (isset($_GET['id']) && $_GET['id'] != NULL) {
	$personne = PersonneDAO::getById($_GET['id']);
	$ancien = AncienDAO::getById($personne->getId());
	if ($ancien != NULL) {
		$imageProfil = $ancien->getImageTrombi();

		$name = 'profil_'.$ancien->getPrenom().'-'.$ancien->getNomPatronymique();
		header('Content-Type: image/jpeg');
		header('Content-Disposition: attachment; filename='.$name.'.jpg');
		echo $imageProfil;
	} else
		echo 'Aucune image de trombi existante pour cet id';

} else {
	echo 'Aucun id n\'a été mis';
}