<?php
require_once(MODELS_INC."DepartementIUT.class.php");

$departementsIUT = DepartementIUTDAO::getAll();

include(VIEWS_INC.'departementsIUT.php');
?>
