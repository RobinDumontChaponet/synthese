<?php

//Pour la liste de promotions
$promotions = PromotionDAO::getAll();

//Pour la liste de diplome iut
$diplomes = DiplomeDUTDAO::getAll();

//Pour la liste de types spécialisations
$typesSpecialisation = TypeSpecialisationDAO::getAll();

include(VIEWS_INC.'recherche.php');

?>
