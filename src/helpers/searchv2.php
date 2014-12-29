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

$suggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], array($_GET['promotionInf'], $_GET['promotionSup']), $_GET['diplomedut'], $_GET['typesspecialisations'], $_GET['specialisation'], $_GET['diplomepostdut'], $_GET['etablissementpostdut'], $_GET['travailactuel']);

echo '<personnes>';

foreach($suggestions as $suggestion) {

	//On regarde d'abord si la personne travaille ou pas
	$listeTravaux = TravailleDAO::getByAncien($suggestion);

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

	//On affiche seulement dans deux cas :
	//	- Si le critere travaille est pris en compte (case cochée) et la personne travaille
	//	- Si le critere travaille n'est pas pris en compte (case non cochée)
	//

	if((isset($_GET['travailactuel']) && $travail) || !isset($_GET['travailactuel']))
		afficherPersonne($suggestion, $travailActuel);

}
echo '</personnes>';

function afficherPersonne($suggestion, $travailActuel) {

    $aEtudie = AEtudieDAO::getByAncien($suggestion);
	$possede = PossedeDAO::getByAncien($suggestion);
	$estSpecialise = EstSpecialiseDAO::getByAncien($suggestion);
	$specialisation = ($estSpecialise!=null)?$estSpecialise->getSpecialisation():null;
	$listeTravaux = TravailleDAO::getByAncien($suggestion);

	echo '<personne>';

	echo '<nom>'.$suggestion->getNomPatronymique().'</nom>';
	echo '<prenom>'.$suggestion->getPrenom().'</prenom>';
	echo '<promotion>'.(($aEtudie!=null)?$aEtudie->getPromotion()->getAnnee():'').'</promotion>';
	echo '<diplomedut>'.(($aEtudie!=null)?$aEtudie->getDiplomeDUT()->getLibelle():'').'</diplomedut>';
	echo '<typesspecialisations>'.(($specialisation!=null)?$specialisation->getTypeSpecialisation()->getLibelle():'').'</typesspecialisations>';
	echo '<specialisation>'.(($specialisation!=null)?$specialisation->getLibelle():'').'</specialisation>';

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

	echo '<travail>'.$travailActuel.'</travail>';
	
	echo '<profil><a href="profil/'.$suggestion->getId().'">Consulter</a></profil>';

	echo '</personne>'."\n";
}
// :D
?>
