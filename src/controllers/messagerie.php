<?php

require_once(MODELS_INC."MessageDAO.class.php");

//Traitement des messages lus
$nm = MessageDAO::getMessagesNonLus($_SESSION['syntheseUser']->getPersonne()->getId());

//La boucle for permet d'afficher du plus recent au moins recent, un foreach ne le fait pas
for($i = (count($nm)-1); $i >= 0; $i--)
    $nouveauxMessages .= '<tr><td>'.$nm[$i]->getExpediteur()->getNomPatronymique().' '.$nm[$i]->getExpediteur()->getPrenom.' </td>
    <td><a href="message/'.$nm[$i]->getId().'">'.$nm[$i]->getObjet().'</a> </td> <td>'.$nm[$i]->getDateMessage().'</td></tr></li>';


//Traitement des messages non lus
$messagesLus = MessageDAO::getMessagesLus($_SESSION['syntheseUser']->getPersonne()->getId());
for($i = (count($messagesLus)-1); $i >= 0; $i--)
    $anciensMessages .= '<tr><td>'.$messagesLus[$i]->getExpediteur()->getNomPatronymique().' '.$messagesLus[$i]->getExpediteur()->getPrenom.' </td>
    <td><a href="message/'.$messagesLus[$i]->getId().'">'.$messagesLus[$i]->getObjet().'</a> </td> <td>'.$messagesLus[$i]->getDateMessage().'</td></tr></li>';

require_once(VIEWS_INC."messagerie.php");

?>
