<?php

if (isset($_GET['id'])) {
	$promo = PromotionDAO::getById($_GET['id']);
    $dept=DepartementIUTDAO::getBySigle($_GET['dep']);
	$anciens = AncienDAO::getAncienByIdPromoAndIdDep($_GET['id'],$dept->getId());
} else {
	$ancient = new Ancien($_SESSION["syntheseUser"]->getPersonne()->getId(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
	$aEtudie = AEtudieDAO::getByAncien($ancient);
	header('Location: '.SELF.'promotion/'.$aEtudie->getPromotion()->getId());
}

include(VIEWS_INC.'promotion.php');

?>
