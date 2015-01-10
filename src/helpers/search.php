<?php

include('conf.inc.php');

session_start();

if($_SESSION["syntheseUser"]) {

    include_once(MODELS_INC.'AncienDAO.class.php');
    include_once(MODELS_INC.'AEtudieDAO.class.php');
    include_once(MODELS_INC.'PossedeDAO.class.php');
    include_once(MODELS_INC.'EstSpecialiseDAO.class.php');
    include_once(MODELS_INC.'SpecialisationDAO.class.php');
    include_once(MODELS_INC.'TravailleDAO.class.php');

    // Définitions des droits
    include_once(MODELS_INC."DisposeDeDAO.class.php");
    $user_auth = DisposeDeDAO::getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), PageDAO::getByLibelle('recherche'))->getDroit();

    if($user_auth['read']) {

        function push(&$array, $suggestion, $travailActuel) {
            $personne = array();

            $libelleTravailActuel = '';
            if($travailActuel)
                $libelleTravailActuel = $travailActuel->getPoste()->getLibelle();

            $aEtudie = AEtudieDAO::getByAncien($suggestion);
            $possede = PossedeDAO::getByAncien($suggestion);
            $estSpecialise = EstSpecialiseDAO::getByAncien($suggestion);
            $specialisation = ($estSpecialise!=null)?$estSpecialise->getSpecialisation():null;
            $travail = TravailleDAO::getByAncien($suggestion);

            $personne['nom'] = $suggestion->getNomPatronymique();
            $personne['prenom'] = $suggestion->getPrenom();
            $personne['promotion'] = ($aEtudie!=null)?$aEtudie->getPromotion()->getAnnee():'';
            $personne['diplomeDUT'] = ($aEtudie!=null)?$aEtudie->getDiplomeDUT()->getLibelle():'';
            $personne['typeSpecialisation'] = ($specialisation!=null)?$specialisation->getTypeSpecialisation()->getLibelle():'';
            $personne['specialisation'] = ($specialisation!=null)?$specialisation->getLibelle():'';

            $personne['diplomesPostDUT'] = array();
            $personne['etablissementsPostDUT'] = array();
            foreach($possede as $it) {
                $personne['diplomesPostDUT'][] = $it->getDiplomePostDUT()->getLibelle();
                $personne['etablissementsPostDUT'][] = $it->getEtablissement()->getNom();
            }

            $personne['travailActuel'] = $libelleTravailActuel;

            $personne['idProfil'] = $suggestion->getId();

            $array[] = $personne;
        }

        header('Content-Type: application/json; charset=utf-8');

        $suggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], array($_GET['promotionInf'], $_GET['promotionSup']), $_GET['diplome'], $_GET['specialisation'],$_GET['typeSpecialisation'], $_GET['diplomePostDUT'], $_GET['etabPostDUT'], ($_GET['travailActuel']=='true')?true:false);

//------------------------------------A VOIR PAR ROBIN-----------------------------------------
       //JE NE SAIS PAS QUOI METTRE DANS LE GET, C'EST UN DE MES PROBLEMES
        /*
        $nbTotal = 0;
        $suggestions = AncienDAO::search($_GET['nom'], $_GET['prenom'], array($_GET['promotionInf'], $_GET['promotionSup']), $_GET['diplome'], $_GET['specialisation'],$_GET['typeSpecialisation'], $_GET['diplomePostDUT'], $_GET['etabPostDUT'], ($_GET['travailActuel']=='true')?true:false, $_GET[''], LINES_PAGE, &$nbTotal);
        */
//------------------------------------A VOIR PAR ROBIN-----------------------------------------

        $array = array();

        foreach($suggestions as $suggestion) {

            //On regarde d'abord si la personne travaille ou pas
            $travail = TravailleDAO::getByAncien($suggestion);

            //Dans la liste de travaux, on recherche celui où la date de fin d'embauche est egal à nul, c'est le travail actuel
            $travailActuel = null;
            foreach($travail as $travailActuel)
                if($travailActuel->getDateEmbaucheFin() == null)
                break;

                //On affiche seulement dans deux cas :
                //	- Si le critere travaille est pris en compte (case cochée) et la personne travaille
                //	- Si le critere travaille n'est pas pris en compte (case non cochée)
                if((isset($_GET['travailactuel']) && $travailActuel) || !isset($_GET['travailactuel']))
                push($array, $suggestion, $travailActuel);

        }
//------------------------------------A VOIR PAR ROBIN-----------------------------------------        
        //VOICI LE CODE QUE J'AI AJOUTE
        /*
        $nbPages = ceil($nbTotal/LINES_PAGE);
        $linksPage = "";
        for($i = 0; $i < $nbPages; $i++)
        {
            $linksPage .= '<label onclick="link_ajax" >'.$i.'</label>';
        }
        */
        
        //Ensuite, on ajoute une case dans le tableau
        //push($array, $linksPage);
//------------------------------------A VOIR PAR ROBIN-----------------------------------------
        echo json_encode($array);

    }
}
?>
