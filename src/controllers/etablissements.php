<?php
$libelleTypeProfil = $_SESSION['syntheseUser']->getTypeProfil()->getLibelle();

$etablissements = EtablissementDAO::getAll();

include(VIEWS_INC.'etablissements.php');

?>