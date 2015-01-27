<?php
if ($_SESSION['user_auth']['write']) {
	require_once(MODELS_INC."EvenementDAO.class.php");
	require_once(MODELS_INC."AParticipeDAO.class.php");

	$typesEvent = TypeEvenementDAO::getAll();

	if($_POST) {
		if ($_POST['date'] == '')
			$_POST['date'] = NULL;
		$typeEvent = new TypeEvenement($_POST['typeEvent'], NULL);
		$event = new Evenement(0, $typeEvent, $_POST['date'], $_POST['commentaire']);
		$idEvent = EvenementDAO::create($event);
		$preferences = PrefereDAO::getByIdTypeEvent($_POST['typeEvent']);
		foreach ($preferences as $preference) {
			$participe = new AParticipe($preference->getAncien(), $event);
			AParticipeDAO::create($participe);
		}
		header('Location: '.SELF.'evenements');
	}
	include(VIEWS_INC.'evenement-ajouter.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>
