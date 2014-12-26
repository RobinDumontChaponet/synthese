<?php

$promos = PromotionDAO::getAll();

include(VIEWS_INC.'promotions.php');

?>