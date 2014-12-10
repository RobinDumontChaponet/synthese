<?php

include(MODELS_INC.'DepartementIUTDAO.class.php');

$departements = DepartementIUTDAO::getAll();

include(VIEWS_INC.'csv-import.php');

?>