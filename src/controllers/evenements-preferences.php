<?php

$idUser = $_SESSION[syntheseUser]->getId();
$typesEvent = TypeEvenementDAO::getAll();
$preferencesTypeEvent = PrefereDAO::getByIdAncien($_SESSION[syntheseUser]->getId());

include(VIEWS_INC.'evenements-preferences.php');
?>