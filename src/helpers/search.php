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

	$aEtudie = AEtudieDAO::getByAncien($suggestion);
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
	
	/*Ce que t'as fait complique les choses. Je ne comprends pas pourquoi t'as mis des getId :/ pourquoi 
	Ne pas afficher tout simplement le libelle directement*/
	
	//Moi (Youssef), ce que je ferai, c'est
	echo '<diplomepostdut>';
		$listeDiplomesDut = "";
		for($i = 0; $i < )
		{
			$listeDiplomesDut .= $possede[i]->getDiplomePostDUT()->getLibelle()." ";
		}
	echo '</diplomepostdut>';
	
	//Cela donnera directement le resultat a afficher dans le tableau... Je trouve que c'est beaucoup plus simple
	//On fait la meme chose pour les etablissements
	echo '<etablissementpostdut>';
		$listeDiplomesDut = "";
		for($i = 0; $i < )
		{
			$listeDiplomesDut .= $possede[0]->getEtablissement()->getNom()." ";
		}
	echo '</etablissementpostdut>';
	//J'aurai egalement enlevé tes getId pour promotion et diplomedut et mis directement les libellés


	///////////////////////// C'est bien de "faire" la recherche, mais décider d'où sort (le booléan, je le rappel) le travail fait parti du travail à faire justement...
	//Je vais la faire samedi, je n'ai pas eu le temps, je suis rentré au Maroc, j'ai dû voir ma famille quand même. :/
	echo '<travail></travail>';
	echo '</personne>'."\n";
}

echo '</personnes>';

?>
