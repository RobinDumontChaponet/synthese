<?php

include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'AEtudieDAO.class.php');
include_once(MODELS_INC.'PossedeDAO.class.php');
include_once(MODELS_INC.'EstSpecialiseDAO.class.php');
include_once(MODELS_INC.'SpecialisationDAO.class.php');

header('Content-Type: text/xml');

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

$suggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], $_GET['promotion'], $_GET['diplomedut'], $_GET['typesspecialisations'], $_GET['specialisation'], $_GET['diplomepostdut'], $_GET['etablissementpostdut'], $_GET['travailactuel']);

echo '<personnes>';

foreach($suggestions as $suggestion) {

	$aEtudie = AEtudieDAO::getByAncien($suggestion);
	$possede = PossedeDAO::getByAncien($suggestion);
	$estSpecialise = EstSpecialiseDAO::getByAncien($suggestion);
	$specialisation = ($estSpecialise!=null)?$estSpecialise->getSpecialisation():null;

	echo '<personne>';

	echo '<nom>'.$suggestion->getNomPatronymique().'</nom>';
	echo '<prenom>'.$suggestion->getPrenom().'</prenom>';
	echo '<promotion>'.(($aEtudie!=null)?$aEtudie->getPromotion()->getAnnee():'').'</promotion>';
	echo '<diplomedut>'.(($aEtudie!=null)?$aEtudie->getDiplomeDUT()->getLibelle():'').'</diplomedut>';
	echo '<typesspecialisations>'.(($specialisation!=null)?$specialisation->getTypeSpecialisation()->getLibelle():'').'</typesspecialisations>';
	echo '<specialisation>'.$specialisation.'</specialisation>';

	echo '<diplomepostdut>';
	$listeDiplomesDut = '';
	foreach($possede as $it)
		$listeDiplomesDut .= $it->getDiplomePostDUT()->getLibelle().' ';
	echo '</diplomepostdut>';

	echo '<etablissementpostdut>';
	$listeDiplomesDut = '';
	foreach($possede as $it)
		$listeDiplomesDut .= $it->getEtablissement()->getNom().' ';
	echo '</etablissementpostdut>';

	/////////////////////////
	echo '<travail></travail>';
	/////////////////////////

	// J'aurai pu répondre à mes questions et finir la recherche, mais j'aurai réécrit à ma manière (plus simple pour moi).
	// Comme je trouve ça non respectieux de ton travail, je ne l'ai pas fait. Mais j'attends en retour que tu finisse ce que tu as commencé.
	// un petit smiley pour la route     :–]
	// Il y a un autre problème : au chargement(onload) de la recherche, tout les anciens sont retournés.

	echo '</personne>'."\n";
}

echo '</personnes>';

?>
