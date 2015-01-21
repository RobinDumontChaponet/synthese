<?php

if (isset($_GET['id']) && isset($_GET['dep'])) {
	$promo = PromotionDAO::getById($_GET['id']);
    $dept=DepartementIUTDAO::getBySigle($_GET['dep']);
	$anciens = AncienDAO::getAncienByIdPromoAndIdDep($_GET['id'],$dept->getId());
} else {
	$ancient = new Ancien($_SESSION["syntheseUser"]->getPersonne()->getId(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
	$aEtudie = AEtudieDAO::getByAncien($ancient);
	header('Location: '.SELF.'promotion/'.$aEtudie[0]->getPromotion()->getId().'/'.$aEtudie[0]->getDepartementIUT()->getSigle());
}

include(VIEWS_INC.'promotion.php');

?>
