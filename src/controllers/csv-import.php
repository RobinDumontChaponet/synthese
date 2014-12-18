<?php

if($_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) { // user is Admin

	include(MODELS_INC.'DepartementIUTDAO.class.php');

	$departements = DepartementIUTDAO::getAll();

	if(!empty($_POST)) {

		include_once(MODELS_INC.'TypeProfil.class.php');
		include_once(MODELS_INC.'CompteDAO.class.php');
		include_once(MODELS_INC.'PersonneDAO.class.php');
		$studentProfile=new TypeProfil(3, 'Ancien'); // Profil d'ancien.
		require_once('csvParser.inc.php');

		$csv = csv2array('csv');

		$order = array();
		foreach($_POST as $key => $value) {
			$order[$value]=$key;
		}

		/**
		 * valeurs possibles :
		 * var csvColName = [
		 * 		{key:'nomUsage', value:'Nom d\'usage'},
		 * 		{key:'nomPat', value:'Nom patronymique'},
		 * 		{key:'prenom', value:'Prénom'},
		 * 		{key:'dateNais', value:'Date de naissance'},
		 * 		{key:'adresse', value:'Adresse postale'},
		 * 		{key:'codePost', value:'Code postal'},
		 * 		{key:'ville', value:'Ville'},
		 * 		{key:'pays', value:'Pays'},
		 * 		{key:'mail', value:'Adresse e-mail'},
		 * 		{key:'telMob', value:'Téléphone mobile'},
		 * 		{key:'telFix', value:'Téléphone fixe'}
		 * ];
		**/

		function fillVal($value) {
			return ($value)?$value:'';
		}

		foreach($csv as $line) {
			$person = new Personne(0, fillVal($line[$order['nomUsage']]), fillVal($line[$order['nomPat']]), fillVal($line[$order['prenom']]), fillVal($line[$order['mail']]));
			echo $person;
			//echo '"0", "'.fillVal($line[$order['nomUsage']]).'", "'.fillVal($line[$order['nomPat']]).'", "'.fillVal($line[$order['prenom']]).'", "'.fillVal($mail=$line[$order['mail']])."\"<br />\n";
			//PersonneDAO::create($person);
			//$login = substr($person->getNomPatronymique(), 0, 4).substr($person->getPrenom(), 0, 4).$person->getId();
			//$account = new Compte(0, $studentProfile, $person, $login, randomPassword());
			//CompteDAO::create($account);
		}
		//header ('Location: index.php?requ=group&id='.$_GET['id']);

	} else
		include(VIEWS_INC.'csv-import.php');
}

?>