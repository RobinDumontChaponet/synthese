<?php

//Pour la liste de promotions
$ls = PromotionDAO::getAll();

$listePromotions = "";

for($i = 0; $i < count($ls); $i++)
{
  $listePromotions .= "<option name=\"".$ls[$i]->getId()."\">".$ls[$i]->getAnnee()."</option>"; 
}


//Pour la liste de diplome iut
$ls = DiplomeDUTDAO::getAll();

$listeDiplomesDUT = "";

for($i = 0; $i < count($ls); $i++)
{
  $listeDiplomesDUT .= "<option name=\"".$ls[$i]->getId()."\">".$ls[$i]->getLibelle()."</option>";
}


//Pour la liste de types spécialisations
$ls = TypeSpecialisationDAO::getAll();

$listeTypesSpecialisation = "";

for($i = 0; $i < count($ls); $i++)
{
  $listeTypesSpecialisation = "<option name=\"".$ls[$i]->getId()."\">".$ls[$i]->getLibelle()."</option>";
}

include(VIEWS_INC.'recherche.php');

?>
