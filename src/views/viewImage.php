<?php
$personne = PersonneDAO::getById($_SESSION[syntheseUser]->getId());
$ancien = AncienDAO::getById($personne->getId());
$imageProfil = $ancien->getImageProfil();
$imageTrombi = $ancien->getImageTrombi();

("Content-type: image/jpg");
echo $imageTrombi;
?>