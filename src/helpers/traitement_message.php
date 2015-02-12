<?php

/*                                                                                                          *
 * Ce code (le tout) devrait pas être dans un helper mais dans un controller								*
 * (ex: message-envoyé, cf: csv-imported),																	*
 * appelé au moment de l'envoi du formulaire.																*
 *                                                                                                          */
//REMARQUE CI DESSUS LUE ET SERA PRISE EN COMPTE TRES PROCHAINEMENT

session_start();

include_once(MODELS_INC.'MessageDAO.class.php');

foreach ($_SESSION['dest_anciens'] as $a)
    MessageDAO::envoyer(date('d/m/Y à H:s'), $a, $_SESSION['syntheseUser']->getPersonne(), $_POST['objet'], $_POST['message']);


/*CETTE PARTIE N'A PAS ENCORE ETE TESTEE CAR LE SERVEUR DE L'IUT NE LE PERMET PAS. C'EST EN ATTENTE DE TESTE, CE POUR QUOI IL Y A 
*L'ADRESSE fadiliYouss@gmail.com

$to = 'fadiliYouss@gmail.com';

$subject = 'Test';

$headers = "From: connectit@univ-lorraine.fr\r\n";
$headers .= "Reply-To: connectit@univ-lorraine.fr\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to, $subject, $message, $headers);
*/
unset($_SESSION['dest_anciens']);


/*                                                                                                          *
 * Devrait être dans une vue (ex: message-envoyé, cf: csv-imported)	[LU ET SERA PRIS EN COMPTE]										*
 *																											*/
echo 'Message envoyé avec succès ! <br /> <a href="recherche">Retour</a>';

?>
