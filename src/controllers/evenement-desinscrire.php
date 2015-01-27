<?php
require_once(MODELS_INC."AParticipeDAO.class.php");

if ($_GET['id']) {
	$pers = new Personne($_SESSION['syntheseUser']->getId(), NULL, NULL, NULL, NULL);
	$event = new Evenement($_GET['id'], NULL, NULL, NULL);
	$aParticipe = new aParticipe($pers, $event);
	AParticipeDAO::delete($aParticipe);
	header('Location: '.SELF.'evenements');
}
?>
