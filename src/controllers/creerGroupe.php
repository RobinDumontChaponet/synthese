<?php
require_once(MODELS_INC.'Groupe.class.php');
require_once(MODELS_INC.'GroupeDAO.class.php');
require_once(MODELS_INC.'AppartientGroupe.class.php');
require_once(MODELS_INC.'AppartientGroupeDAO.class.php');
//On vérifie si on recoit le post du boutton d'ajout de groupe
if(isset($_POST['addGroupe'])){
    if(trim($_POST['nom'])!=""){
        $nouveauGroupe=new Groupe(1,trim($_POST['nom']),$_SESSION["syntheseUser"]->getPersonne(),"normal");
        $id=GroupeDAO::create($nouveauGroupe);
        $membres=new AppartientGroupe($nouveauGroupe,array($_SESSION["syntheseUser"]->getPersonne()));
        AppartientGroupeDAO::create($membres);
    }else{
        echo "Le nom est vide";   
    }
}

// inclusion de la vue
include(VIEWS_INC.'creerGroupe.php');

?>