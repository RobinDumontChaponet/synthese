<?php

$libelleTypeProfil = $_SESSION['syntheseUser']->getTypeProfil()->getLibelle();

$eventsAnt = EvenementDAO::getEvenementAnterieur();
$eventsPost = EvenementDAO::getEvenementPosterieur();
$eventsInscriPost = AParticipeDAO::getAParticipePost($_SESSION['syntheseUser']->getId());
$eventsNotInscriPost = EvenementDAO::getByAncienNotParticipePost($_SESSION['syntheseUser']->getId());

include(VIEWS_INC.'evenements.php');

?>