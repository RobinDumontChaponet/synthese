<?php
if (isset($_GET['id']))
	$personne = PersonneDAO::getById($_GET['id']);
else
	$personne = PersonneDAO::getById($_SESSION[syntheseUser]->getId());

$ancien = AncienDAO::getById($personne->getId());

if ($ancien != NULL) {
$imageProfil = $ancien->getImageProfil();
$imageTrombi = $ancien->getImageTrombi();
	if ($imageProfil == NULL)
		$noImageProfil = 1;
	if ($imageTrombi == NULL)
		$noImageTrombi = 1;
}
include(VIEWS_INC.'profil.php');

?>
