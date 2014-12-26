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
	var_dump($suggestion);

	$aEtudie = AEtudieDAO::getByAncien($suggestion;
	$possede = PossedeDAO::getByAncien($suggestion);
	$estSpecialise = EstSpecialiseDAO::getByAncien($suggestion);
	$specialisation = ($estSpecialise!=null)?$estSpecialise->getSpecialisation():null;

	echo '<personne>';
	echo '<nom>'.$suggestion->getNomPatronymique().'</nom>';
	echo '<prenom>'.$suggestion->getPrenom().'</prenom>';
	echo '<promotion>'.$aEtudie->getPromotion()->getId().'</promotion>';
	echo '<diplomedut>'.$aEtudie->getDiplomeDUT()->getId().'</diplomedut>';
	echo '<typesspecialisations>'.(($specialisation!=null)?$specialisation->getTypeSpecialisation()->getId():'').'</typesspecialisations>';
	echo '<specialisation>'.(($specialisation!=null)?$specialisation->getId():'').'</specialisation>';



	///////////////////////// Comment fait-on ici ? On a un array de diplômes...
	//echo '<diplomepostdut>',$possede[0]->getDiplomePostDUT()->getId(),'</diplomepostdut>';
	//echo '<etablissementpostdut>'.$possede[0]->getEtablissement()->getId().'</etablissementpostdut>';


	///////////////////////// C'est bien de "faire" la recherche, mais décider d'où sort (le booléan, je le rappel) le travail fait parti du travail à faire justement...
	echo '<travail></travail>';
	echo '</personne>'."\n";
}

echo '</personnes>';

?>