<?php

$entreprises = EntrepriseDAO::getAll();
include(VIEWS_INC.'entreprises.php');
?>
