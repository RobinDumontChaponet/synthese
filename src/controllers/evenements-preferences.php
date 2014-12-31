<?php

$idUser = $_SESSION[syntheseUser]->getId();
$typesEvent = TypeEvenementDAO::getAll();
$preferencesTypeEvent = PrefereDAO::getByIdAncien($_SESSION[syntheseUser]->getId());
$ancien = new Ancien($_SESSION[syntheseUser]->getId(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

if ($_POST) {
	var_dump($_POST);
	foreach($preferencesTypeEvent as $preferenceTypeEvent) {
		if (!in_array($preferenceTypeEvent->getTypeEvenement()->getId(),$_POST)) {
			$event = new TypeEvenement($preferenceTypeEvent->getTypeEvenement()->getId(), NULL);
			$prefere = new Prefere($ancien, $event);
			echo 'Il va être supprimé'.$preferenceTypeEvent->getTypeEvenement()->getId().'</br>';
			//PrefereDAO::delete($prefere);
		}
	}
}
include(VIEWS_INC.'evenements-preferences.php');
?>