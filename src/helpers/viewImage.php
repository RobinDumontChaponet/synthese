<?php

include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'PersonneDAO.class.php');

$personne = PersonneDAO::getById($_GET['id']);
$ancien = AncienDAO::getById($personne->getId());

$name = 'profil_'.$ancien->getPrenom().'-'.$ancien->getNomPatronymique();
header('Content-Type: image/jpeg');
header('Content-Disposition: attachment; filename='.$name.'.jpg');

echo $ancien->getImageProfil();

?>