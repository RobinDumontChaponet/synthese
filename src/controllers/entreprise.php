<?php
$entreprise = EntrepriseDAO::getById($_GET['id']);

include(VIEWS_INC.'entreprise.php');
?>
