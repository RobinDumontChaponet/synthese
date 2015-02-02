<?php

session_start();


include_once(MODELS_INC.'AncienDAO.class.php');
$anciens = array();

if(isset($_POST['selectionne']) || isset($_POST['destinataire']) || isset($_POST['dest_rep']))
{

if(isset($_POST['selectionne']))
{
    //On recupere les adresses mail
    foreach($_POST['selectionne'] as $check)
    {
        $ancien = AncienDAO::getById($check);
        array_push($anciens, $ancien);
        $chaine_mails .= $ancien->getNom().' '.$ancien->getPrenom().'; ';
    }
    $_SESSION['dest_anciens'] = $anciens;
}else if(isset($_POST['dest_rep'])) {

    $ancien = AncienDAO::getById($_POST['dest_rep']);
    array_push($anciens, $ancien);
    $_SESSION['dest_anciens'] = $anciens;

    $chaine_mails = $ancien->getNom().' '.$ancien->getPrenom();
}




    if( ($_POST['destinataire'] != '') && ($_POST['objet'] != '') && ($_POST['message'] != '') )
    {
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
    include(VIEWS_INC.'recherche.php');
}

?>
