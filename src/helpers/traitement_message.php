<?php

/*                                                                                                          *
 * Ce code (le tout) devrait pas être dans un helper mais dans un controller								*
 * (ex: message-envoyé, cf: csv-imported),																	*
 * appelé au moment de l'envoi du formulaire.																*
 *                                                                                                          */

session_start();

include_once(MODELS_INC.'MessageDAO.class.php');

foreach ($_SESSION['dest_anciens'] as $a)
    MessageDAO::envoyer(date('d/m/Y à H:s'), $a, $_SESSION['syntheseUser']->getPersonne(), $_POST['objet'], $_POST['message']);

unset($_SESSION['dest_anciens']);


/*                                                                                                          *
 * Devrait être dans une vue (ex: message-envoyé, cf: csv-imported)											*
 *																											*/
echo '<p class="true">Message envoyé ! <br /> <a href="messagerie">Retour</a></p>';

?>