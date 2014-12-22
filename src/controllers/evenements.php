<?php
$user = $_SESSION[syntheseUser]->getTypeProfil()->getLibelle();

$events = EvenementDAO::getAll();
//var_dump($events);

include(VIEWS_INC.'evenements.php');
?>