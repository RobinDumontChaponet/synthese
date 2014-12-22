<?php

include('conf.inc.php');
include_once(MODELS_INC.'AncienDAO.class.php');

header('Content-Type: text/xml');

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

$listeSuggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], $_GET['promotion'], $_GET['diplomedut'], $_GET['typesspecialisations'], $_GET['specialisation'], $_GET['diplomepostdut'], $_GET['etablissementpostdut'], $_GET['travailactuel']);

echo '<personnes>';

foreach($listeSuggestions as $suggestion) {
	var_dump($suggestion);
	echo '<personne><nom>'..'</nom><prenom>'.$suggestion->getPrenom().'</prenom><promotion>'.$suggestio->getPromotion()->getId().'</promotion><diplomedut>'.$suggestion->getDiplomeDUT()->getId().'</diplomedut><typesspecialisations>'.$suggestion->getTypeSpecialisation()->getId().'</typesspecialisations><specialisation>'.$suggestion->getSpecialisation()->getId().'</specialisation><diplomepostdut>'.$suggestion->getDiplomeDUT()->getId().'</diplomepostdut><etablissementpostdut>'.$suggestion->getEtablissement()->getId().'</etablissementpostdut><travailactuel>'.$suggestion->getTr.'</travailactuel></personne>';

}

echo '</personnes>';

?>