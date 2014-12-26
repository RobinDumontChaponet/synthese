<?php

$entreprise = EntrepriseDAO::getById($_GET['id']);
$user = $_SESSION[syntheseUser]->getTypeProfil()->getLibelle();

include(VIEWS_INC.'entreprise.php');

?>