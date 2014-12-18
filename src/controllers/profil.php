<?php

$ancien = AncienDAO::getAll();
var_dump($ancien);
var_dump($_SESSION[syntheseUser]->getId());
include(VIEWS_INC.'profil.php');

?>
