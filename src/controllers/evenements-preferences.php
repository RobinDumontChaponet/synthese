<?php

$idUser = $_SESSION[syntheseUser]->getId();
$typesEvent = TypeEvenementDAO::getAll();
$preferes = PrefereDAO::getByIdAncien($_SESSION[syntheseUser]->getId());
$ancien = new Ancien($_SESSION[syntheseUser]->getId(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

$preferencesTypesEvent = array();
foreach($preferes as $preferenceTypeEvent)
	$preferencesTypesEvent[]=$preferenceTypeEvent->getTypeEvenement()->getId();

if(isset($_POST['submit'])) {
	if (!empty($_POST['check'])) {
		foreach($typesEvent as $typeEvent) {
			if (in_array($typeEvent->getId(), $_POST['check']) && !in_array($typeEvent->getId(), $preferencesTypesEvent)) {
				$prefere = new Prefere($ancien, $typeEvent);
				PrefereDAO::create($prefere); // $typeEvent va être ajouté
				$preferencesTypesEvent[] = $prefere->getTypeEvenement()->getId();
			}
			if (in_array($typeEvent->getId(), $preferencesTypesEvent) && !in_array($typeEvent->getId(), $_POST['check'])) {
				$prefere = new Prefere($ancien, $typeEvent);
				PrefereDAO::delete($prefere); // $typeEvent va être supprimé
				if(($key = array_search($prefere->getTypeEvenement()->getId(), $preferencesTypesEvent)) !== false)
					unset($preferencesTypesEvent[$key]);
			}
		}
	} else
		foreach($preferes as $prefere) {
			PrefereDAO::delete($prefere); // $prefere->getTypeEvenement() va être supprimé
			if(($key = array_search($prefere->getTypeEvenement()->getId(), $preferencesTypesEvent)) !== false)
				unset($preferencesTypesEvent[$key]);
		}
}

include(VIEWS_INC.'evenements-preferences.php');

?>