<?php

$idUser = $_SESSION[syntheseUser]->getId();
$typesEvent = TypeEvenementDAO::getAll();
$preferencesTypeEvent = PrefereDAO::getByIdAncien($_SESSION[syntheseUser]->getId());
$ancien = new Ancien($_SESSION[syntheseUser]->getId(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

if ($_POST != NULL) {
	foreach ($_POST as $pref) {
		foreach($preferencesTypeEvent as $preferenceTypeEvent) {
			echo 'Préférence'.$preferenceTypeEvent->getTypeEvenement()->getId().'</br>';
			echo 'Case cochée :'.$pref.'</br>';	
			if ($pref != $preferenceTypeEvent->getTypeEvenement()->getId()) {
				echo 'Celui ci est différent :'.$preferenceTypeEvent->getTypeEvenement()->getId().' et '.$pref.'</br>';
				//	Ici un create prefereDAO avec l'ancien et le type event créer avec id = $pref et libelle NULL
			} else {
				echo 'Celui ci est pareil !'.$preferenceTypeEvent->getTypeEvenement()->getId().' et '.$pref.'</br>';
			}
		}	
	}
}

include(VIEWS_INC.'evenements-preferences.php');
?>