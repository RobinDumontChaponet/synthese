<?php

include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');
include_once(MODELS_INC.'AEtudieDAO.class.php');
include_once(MODELS_INC.'PossedeDAO.class.php');
include_once(MODELS_INC.'EstSpecialiseDAO.class.php');
include_once(MODELS_INC.'SpecialisationDAO.class.php');
include_once(MODELS_INC.'TravailleDAO.class.php');

header('Content-Type: text/xml');

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

$suggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], $_GET['promotion'], $_GET['diplomedut'], $_GET['typesspecialisations'], $_GET['specialisation'], $_GET['diplomepostdut'], $_GET['etablissementpostdut'], $_GET['travailactuel']);

echo '<personnes>';

foreach($suggestions as $suggestion) {

	$aEtudie = AEtudieDAO::getByAncien($suggestion);
	$possede = PossedeDAO::getByAncien($suggestion);
	$estSpecialise = EstSpecialiseDAO::getByAncien($suggestion);
	$specialisation = ($estSpecialise!=null)?$estSpecialise->getSpecialisation():null;
	$listeTravaux = TravailleDAO::getByAncien($suggestion);
	//// Warning : C'est dangereux d'appeler un variable liste, ça peut faire référence au type liste. (mais c'est pas grave ;-])

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
	//Ici, Mathieu doit encore changer a dao pour faire un getByAncien avec ancien et non id en parametres

	///////////////////////////////////////////////////////////////////////// ^- C'est déjà le cas.
	// De quelle DAO parles-tu ?


	//Dans la liste de travaux, on recherche celui où la date de fin d'embauche est egal à nul, c'est le travail actuel
	//raison du choix de l'algorithme :::> Nous evite de parcourir tout le tableau, s'arrete dès qu'il a trouvé
	///////////////////////// Vrai ! Mais on peux simplifier la logique et l'emprunte mémoire & instruction ;-)
	$travail = null;
	foreach($listeTravaux as $travail)
		if($travail->getDateEmbaucheFin() == null)
			break;

	if($travail)
		$travailActuel = $travail->getPoste()->getLibelle();
	else
		$travailActuel = "Aucun travail actuellement";

	echo '<travail>'.$travailActuel.'</travail>';
	// :D

	echo '</personne>'."\n";
}

echo '</personnes>';

?>
