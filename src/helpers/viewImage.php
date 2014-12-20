<?php

include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'PersonneDAO.class.php');

$personne = PersonneDAO::getById($_GET['id']);
$ancien = AncienDAO::getById($personne->getId());
$imageProfil = $ancien->getImageProfil();
//$imageTrombi = $ancien->getImageTrombi();

("Content-type: image/jpg");
echo $imageTrombi;
?>