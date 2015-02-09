<?php

$entreprise = EntrepriseDAO::getById($_GET['id']);
$libelleTypeProfil = $_SESSION['syntheseUser']->getTypeProfil()->getLibelle();

include(VIEWS_INC.'entreprise.php');

?>