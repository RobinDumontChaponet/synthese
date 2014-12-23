<?php

include('conf.inc.php');

session_start();

if($_SESSION["syntheseUser"]) {

	include_once(MODELS_INC.'AncienDAO.class.php');
	include_once(MODELS_INC.'PersonneDAO.class.php');

	// Définitions des droits
	include_once(MODELS_INC."DisposeDeDAO.class.php");
	$user_auth = DisposeDeDAO::getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), PageDAO::getByLibelle('profil'))->getDroit();

	if($user_auth['read']) {

		if (isset($_GET['id']) && $_GET['id'] != NULL) {
			$personne = PersonneDAO::getById($_GET['id']);
			$ancien = AncienDAO::getById($personne->getId());
			if ($ancien != NULL) {
				$imageProfil = $ancien->getImageProfil();

				$name = 'profil_'.$ancien->getPrenom().'-'.$ancien->getNomPatronymique();
				header('Content-Type: image/jpeg');
				header('Content-Disposition: attachment; filename='.$name.'.jpg');
				echo $imageProfil;
			} else
				echo 'Aucune image de profil existante pour cet id';

		} else
			echo 'Aucun id n\'a été fourni';

	}

}