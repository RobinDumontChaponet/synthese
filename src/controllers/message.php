<?php

include_once(MODELS_INC.'MessageDAO.class.php');

$message = MessageDAO::getById($_GET['id']);

MessageDAO::setMessageLu($message);

if (($message != null) && ($message->getAnciens()->getId() == $_SESSION['syntheseUser']->getPersonne()->getId())) {

    //On prepare les infos
    $date = $message->getDateMessage();
    $expediteur = $message->getExpediteur()->getNom().' '.$message->getExpediteur()->getPrenom();
    $objet = $message->getObjet();
    $corps = $message->getMessage();

    require_once(VIEWS_INC."message.php");
} else {
    require_once(CONTROLLERS_INC."messagerie.php");
}

?>
