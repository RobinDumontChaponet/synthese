<?php

//Pour la liste de diplome iut
$diplomes = DiplomeDUTDAO::getAll();

//Pour la liste de promotions
$promotions = PromotionDAO::getAll();

//Pour les spécialisations
$spes = SpecialisationDAO::getAll();

//Pour la liste de types spécialisations
$typesSpecialisation = TypeSpecialisationDAO::getAll();

//Pour la liste des diplomes post dut
$diplomesPostDut = DiplomePostDUTDAO::getAll();


include(VIEWS_INC.'recherche.php');

?>
