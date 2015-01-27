<?php

session_start();

include_once(MODELS_INC.'MessageDAO.class.php');

foreach ($_SESSION['dest_anciens'] as $a)
    MessageDAO::envoyer(date('d/m/Y à H:s'), $a, $_SESSION['syntheseUser']->getPersonne(), $_POST['objet'], $_POST['message']);

unset($_SESSION['dest_anciens']);

echo 'Message envoyé avec succès ! <br /> <a href="recherche">Retour</a>';

?>
