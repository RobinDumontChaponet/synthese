<?php

if (isset($_GET['id'])) {
	$promo = PromotionDAO::getById($_GET['id']);
	$anciens = AncienDAO::getAncienByIdPromo($_GET['id']);
} else
	$anciens = null;

include(VIEWS_INC.'promotion.php');

?>