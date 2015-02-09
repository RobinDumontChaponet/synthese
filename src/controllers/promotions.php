<?php

include_once(MODELS_INC.'PromotionDAO.class.php');
include_once(MODELS_INC.'DepartementIUTDAO.class.php');

$promotions = PromotionDAO::getAll();

$departements = DepartementIUTDAO::getAll();

include(VIEWS_INC.'promotions.php');

?>