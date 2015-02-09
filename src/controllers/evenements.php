<?php
$libelleTypeProfil = $_SESSION['syntheseUser']->getTypeProfil()->getLibelle();
$nbEventsAnt=0;
$eventsAnt = EvenementDAO::getEvenementAnterieur(null,null,$nbEventsAnt);
$nbEventsPost=0;
$eventsPost = EvenementDAO::getEvenementPosterieur(null,null,$nbEventsPost);
$nbEventsInscriPost=0;
$eventsInscriPost = AParticipeDAO::getAParticipePost($_SESSION['syntheseUser']->getId(),null,null,$nbEventsInscriPost);
$nbEventsNotInscriPost=0;
$eventsNotInscriPost = EvenementDAO::getByAncienNotParticipePost($_SESSION['syntheseUser']->getId(),null,null,$nbEventsNotInscriPost);
$nbEventsWithoutDate=0;
$eventsWithoutDate = EvenementDAO::getEvenementWithoutDate(null,null,$nbEventsWithoutDate);
$nbEventsWithoutDateNotInscri=0;
$eventsWithoutDateNotInscri = EvenementDAO::getByAncienWithoutDateNotInscri($_SESSION['syntheseUser']->getId(),null,null,$nbEventsWithoutDateNotInscri);
include(VIEWS_INC.'evenements.php');
?>
