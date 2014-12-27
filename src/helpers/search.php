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





	//Dans la liste de travaux, on recherche celui où la date de fin d'embauche est egal à nul, c'est le travail actuel
	$travailActuel = null;
	$iterator = 0;
	$trouve = 0;
	//raison du choix de l'algorithme :::> Nous evite de parcourir tout le tableau, s'arrete dès qu'il a trouvé
	while(($iterator < count($listeTravaux) ) && (trouve == 0))
	{
		if($listeTravaux[$iterator]->getDateEmbaucheFin() == null){trouve = 1;}else{$iterator++;}
	}

	//Si on n'a pas trouve, affiche un "Aucun travail actuellement", sinon, on met le libelle du travail
	if(trouve == 1)
	{
		$travailActuel = $listeTravaux[$iterator]->getPoste()->getLibelle();
	}else
	{
		$travailActuel = "Aucun travail actuellement";
	}

	//On affiche enfin le resultat de notre recherche
	echo '<travail>'.$travailActuel.'</travail>';
	/////////////////////////

	// un petit smiley pour la route     :–]
//REPONSE :
	// :D

	// Il y a un autre problème : au chargement(onload) de la recherche, tout les anciens sont retournés.
//REPONSE :
	//Youssef : Au onload, normal que tous les anciens soient retournés. C'est ce que j'ai voulu
	//faire. C'est comme une recherche sans arguments. Et au fur et à mesure que l'utilisateur
	//entre des criteres de recherche, le resultat présenté par le tableau change

	echo '</personne>'."\n";
}

echo '</personnes>';

?>
