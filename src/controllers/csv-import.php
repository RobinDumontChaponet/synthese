<?php

if($_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) { // user is Admin

	include(MODELS_INC.'DepartementIUTDAO.class.php');
	include('passwordHash.inc.php');
	include('validate.transit.inc.php');

	$departements = DepartementIUTDAO::getAll();

	if(!empty($_POST)) {

		include_once(MODELS_INC.'TypeProfil.class.php');
		include_once(MODELS_INC.'CompteDAO.class.php');
		include_once(MODELS_INC.'AncienDAO.class.php');
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
	{key:'nomUsage', value:'Nom d\'usage'},
	{key:'nomPat', value:'Nom'},
	{key:'prenom', value:'Prénom'},
	{key:'dateNais', value:'Date de naissance'},
	{key:'codePost', value:'Code postal'},
	{key:'ville', value:'Ville'},
	{key:'pays', value:'Pays'},
	{key:'mail', value:'e-mail'},
	{key:'telMob', value:'Téléphone mobile'},
	{key:'telFix', value:'Téléphone fixe'},
	{key:'sexe', value:'Sexe'},
	{key:'adresse1', value:'Adresse 1'},
	{key:'adresse2', value:'Adresse 2'},
	{key:'diplomePostDUT', value:'Diplôme Post DUT'},
	{key:'formationPostDUT', value:'Formation Post DUT'},
	{key:'formationEnCours', value:'Formation en cours'},
	{key:'situation', value:'Situation actuelle'},
	{key:'entreprise', value:'Entreprise'},
	{key:'fonction', value:'Fonction'},
	{key:'ecole', value:'École'},
	{key:'piplômePrepare', value:'Diplôme préparé'},
	{key:'TelEntreprise', value:'Téléphone Entreprise'},
	{key:'reponse', value:'Réponse'}
			];
		**/

		function fillVal($value) {
			return ($value)?$value:'';
		}

		foreach($csv as $line) {
			//$person = new Personne(0, fillVal($line[$order['nomUsage']]), fillVal($line[$order['nomPat']]), fillVal($line[$order['prenom']]), fillVal($line[$order['mail']]));

			$sexe = strtolower(fillVal($line[$order['sexe']]));
			if($sexe=='feminin' || $sexe=='fminin' || strrpos($sexe, 'fem', -strlen($sexe)) !== FALSE)
				$sexe = 'f';
			if($sexe=='masculin' || strrpos($sexe, 'mas', -strlen($sexe)) !== FALSE)
				$sexe = 'm';

			$parents = null;

			$ancien = new Ancien(0, fillVal($line[$order['nomUsage']]), fillVal($line[$order['nomPat']]), fillVal($line[$order['prenom']]), fillVal($line[$order['adresse1']]), fillVal($line[$order['adresse2']]), fillVal($line[$order['codePost']]), fillVal($line[$order['ville']]), fillVal($line[$order['pays']]), fillVal($line[$order['telMob']]), fillVal($line[$order['telFix']]), null, null, $parents, $sexe, fillVal($line[$order['dateNais']]), fillVal($line[$order['mail']]));
			var_dump($ancien);
			//echo '"0", "'.fillVal($line[$order['nomUsage']]).'", "'.fillVal($line[$order['nomPat']]).'", "'.fillVal($line[$order['prenom']]).'", "'.fillVal($mail=$line[$order['mail']])."\"<br />\n";
			echo "\n<br />";
			//PersonneDAO::create($person);
			//$login = substr($ancien->getNomPatronymique(), 0, 4).$person->getId().substr($person->getPrenom(), 0, 4);
			//$account = new Compte(0, $studentProfile, $person, $login, randomPassword());
			//echo '		Login -> '.$login;
			//echo '<br />'; var_dump($account);
			//echo "\n<br />";
			//CompteDAO::create($account);
		}
		//header ('Location: index.php?requ=group&id='.$_GET['id']);

	} else
		include(VIEWS_INC.'csv-import.php');
} else
		include(VIEWS_INC.'403.php');

?>
