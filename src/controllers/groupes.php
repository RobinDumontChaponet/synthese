<?php
    require_once(MODELS_INC.'GroupeDAO.class.php');
    //si admin :: tous les groupes
    if($_SESSION["syntheseUser"]->getTypeProfil()->getId()==1){
        $lst=GroupeDAO::getAll();
    }else{
        $lst=GroupeDAO::getGroupeByPersonne($_SESSION["syntheseUser"]->getPersonne()->getId());
        // A ajouter le groupe pour la promo
    }

    include(VIEWS_INC.'groupes.php');
?>