<?php

include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'AEtudieDAO.class.php');
include_once(MODELS_INC.'PossedeDAO.class.php');
include_once(MODELS_INC.'EstSpecialiseDAO.class.php');
include_once(MODELS_INC.'SpecialisationDAO.class.php');

header('Content-Type: text/xml');

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

$listeSuggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], $_GET['promotion'], $_GET['diplomedut'], $_GET['typesspecialisations'], $_GET['specialisation'], $_GET['diplomepostdut'], $_GET['etablissementpostdut'], $_GET['travailactuel']);

echo '<personnes>';

foreach($listeSuggestions as $suggestion) {
	//var_dump($suggestion);
	$diplomeDUT = AEtudieDAO::getByAncien($suggestion->getId());
	//var_dump($diplomeDUT);
	$diplomePostDUT = PossedeDAO::getByAncien($suggestion->getId());
	$estSpecialise = EstSpecialiseDAO::getByAncien($suggestion->getId());
	$specialisation = $estSpecialise->getSpecialisation();

	echo '<personne>';
	echo '<nom>'.$suggestion->getNom().'</nom>';
	echo '<prenom>'.$suggestion->getPrenom().'</prenom>';
	echo '<promotion>'.$diplomeDUT->getPromotion()->getId().'</promotion>';
	//echo '<diplomedut>'.$diplomeDUT->getId().'</diplomedut>';
	echo '<typesspecialisations>'.$estSpecialise->getSpecialisation()->getTypeSpecialisation()->getId().'</typesspecialisations>';
	echo '<specialisation>'.$estSpecialise->getSpecialisation()->getId().'</specialisation>';
	echo '<diplomepostdut>'.$diplomePostDUT->getId().'</diplomepostdut>';
	echo '<etablissementpostdut>'.$suggestion->getEtablissement()->getId().'</etablissementpostdut>';
	echo '<travail></travail>';
	echo '</personne>';
}

echo '</personnes>';

?>