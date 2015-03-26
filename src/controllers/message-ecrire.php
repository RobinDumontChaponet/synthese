<?php

session_start();


include_once(MODELS_INC.'AncienDAO.class.php');
$anciens = array();


if(isset($_POST['selectionne']) || isset($_POST['destinataire']) || isset($_POST['dest_rep']) || isset($_GET['destinataire']))
{

    if(isset($_POST['selectionne']))
    {
        //On recupere les adresses mail
       
        
        $anciens = getFromSelection();
        foreach($anciens as $ancien)
            $chaine_mails .= $ancien->getNomPatronymique().' '.$ancien->getPrenom().'; ';
        
        
        $_SESSION['dest_anciens'] = $anciens;
    }else if(isset($_POST['dest_rep'])) {
        
        $ancien = AncienDAO::getById($_POST['dest_rep']);
        array_push($anciens, $ancien);
        $_SESSION['dest_anciens'] = $anciens;

        $chaine_mails = $ancien->getNomPatronymique().' '.$ancien->getPrenom();
    }



    if( (trim($_POST['destinataire']) != '') && (trim($_POST['objet']) != '') && (trim($_POST['message']) != '') )
    {
        
        if (($_POST['chosen'] != '') && (!is_array($_SESSION['dest_anciens']))) {
            $_SESSION['dest_anciens'] = completeFromInput($_POST['chosen']);
        } else {
            $_SESSION['dest_anciens'] = array_merge($_SESSION['dest_anciens'], completeFromInput($_POST['chosen']));
        }
         
        
        
        include_once('helpers/traitement_message.php');
    }else
    {
        $destinataire = ($chaine_mails == '')?$_POST['destinataire']:$chaine_mails;
        $objet = $_POST['objet'];
        $message = $_POST['message'];
        include(VIEWS_INC.'message-ecrire.php');
    }
}else
{
    $msgErrAdresse = "Il faut obligatoirement sélectionner des étudiants !";
    include(CONTROLLERS_INC.'recherche.php');
}


function completeFromInput($ids='') {
        $listComplete = array();
        if ($ids != '') {
                $ids = explode("-", $_POST['chosen']);
                array_pop($ids);
                foreach ($ids as $id) {
                    $ancien = AncienDAO::getById($id);
                    array_push($listComplete, $ancien);
                }
        }
    return $listComplete;
}

function getFromSelection() {
    $listComplete = array();
    
    $ids = explode("-", $_POST['infosCheck']);
    array_pop($ids);

    if ($ids[0] == 1) {
        $all = AncienDAO::getAll();
        for ($i = 0, $l = count($all); $i < $l; $i++) {
            if (!in_array($all[$i]->getId(), $ids))
                array_push($listComplete, $all[$i]);
        }
    } else {
        for ($i = 1, $l = count($ids); $i < $l; $i++) {
            $ancien = AncienDAO::getById($ids[$i]);
            array_push($listComplete, $ancien);
        }   
    }
    return $listComplete;
}

?>
