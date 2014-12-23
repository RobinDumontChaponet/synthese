<?php

if($_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) { // user is Admin

	include(MODELS_INC.'DepartementIUTDAO.class.php');
	include('passwordHash.inc.php');

	$departements = DepartementIUTDAO::getAll();

	if(!empty($_POST)) {

		include_once(MODELS_INC.'TypeProfil.class.php');
		include_once(MODELS_INC.'CompteDAO.class.php');
		include_once(MODELS_INC.'PersonneDAO.class.php');
		$studentProfile=new TypeProfil(3, 'Ancien'); // Profil d'ancien.
		require_once('csvParser.inc.php');

		$csv = csv2array('csv', 1);

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
		 * 		{key:'sexe', value:'Sexe'}
		 * ];
		**/

		function fillVal($value) {
			return ($value)?$value:'';
		}

		foreach($csv as $line) {
			$person = new Personne(0, fillVal($line[$order['nomUsage']]), fillVal($line[$order['nomPat']]), fillVal($line[$order['prenom']]), fillVal($line[$order['mail']]));
			var_dump($person);
			//echo '"0", "'.fillVal($line[$order['nomUsage']]).'", "'.fillVal($line[$order['nomPat']]).'", "'.fillVal($line[$order['prenom']]).'", "'.fillVal($mail=$line[$order['mail']])."\"<br />\n";
			echo "\n<br />";
			//PersonneDAO::create($person);
			$login = substr($person->getNomPatronymique(), 0, 4).$person->getId().substr($person->getPrenom(), 0, 4);
			$account = new Compte(0, $studentProfile, $person, $login, randomPassword());
			echo '		Login -> '.$login;
			echo '<br />'; var_dump($account);
			echo "\n<br />";
			//CompteDAO::create($account);
		}
		//header ('Location: index.php?requ=group&id='.$_GET['id']);

	} else
		include(VIEWS_INC.'csv-import.php');
} else
		include(VIEWS_INC.'403.php');

?>
