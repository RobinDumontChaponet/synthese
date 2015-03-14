<?php

if($_SESSION['user_auth']['write']) { // user can write

	include(MODELS_INC.'DepartementIUTDAO.class.php');
	include('passwordHash.inc.php');
	include('validate.transit.inc.php');

	$departements = DepartementIUTDAO::getAll();

	if(!empty($_POST)) {

		/*
echo 'POST : ';
		var_dump($_POST);
		echo '<br /><br />GET : ';
		var_dump($_GET);
		echo '<br /><br />';
*/

		$in=$_POST;
		if(isset($_POST['submitFinal'])) {
			$in=$_GET;
			/*
echo '<p class="warning">submitFinal, $in = ';
			var_dump($in);
			echo '</p>';
*/
		}/*
 else {
			echo '<p class="warning">NOTsubmitFinal, $in = ';
			var_dump($in);
			echo '</p>';
		}
*/

		// echo '<br /><br /><br/>';

		$valid = array();

		include_once(MODELS_INC.'TypeProfil.class.php');
		include_once(MODELS_INC.'CompteDAO.class.php');
		include_once(MODELS_INC.'AncienDAO.class.php');
		include_once(MODELS_INC.'PromotionDAO.class.php');
		include_once(MODELS_INC.'DepartementIUTDAO.class.php');

		$studentProfile=new TypeProfil(3, 'Ancien'); // Profil d'ancien.
		require_once('csvParser.inc.php');

		if(empty($in['departement']) || $in['departement']==NULL)
			$valid['departement']=false;
		else
			$departement = DepartementIUTDAO::getById($in['departement']);

		if(empty($in['promotion']) || $in['promotion']==NULL)
			$valid['promotion']=false;
		else {
			$promotion = PromotionDAO::getByAnnee($in['promotion']);
			if($promotion==NULL) {
				$promotion = new Promotion(0, $in['promotion']);
				PromotionDAO::create($promotion);
			}
		}

		/*
echo 'departement : ';
		var_dump($departement);
		echo '<br /><br />promotion : ';
		var_dump($promotion);
		echo '<br /><br />';
*/

		if($departement!=NULL && $promotion!=NULL) {

			$order = array();
			if(isset($_POST['submitFinal'])) {
				$csv = csv2array('csv', 0);
				$order=$in;
			} else {
				$csv = csv2array('csv', 1);
				foreach($in as $key => $value)
					if(strpos($key, 'type_') === 0)
						$order[$value]=substr($key, 5);
			}


			/*
echo '<br />order : ';
			var_dump($order);
			echo '<br />';

			echo '<br /><br />csv : ';
			var_dump($csv);
			echo '<br />';
*/

			/**
			 * valeurs possibles :
			 * [
				{key:'Ancien', value: [
					{key:'nomPat', value:'Nom'},
					{key:'nomUsage', value:'Nom d\'usage'},
					{key:'prenom', value:'Prénom'},
					{key:'dateNais', value:'Date de naissance'},
					{key:'mail', value:'E-mail'},
					{key:'telMob', value:'Téléphone mobile'},
					{key:'telFix', value:'Téléphone fixe'},
					{key:'sexe', value:'Sexe'},
					{key:'adresse1', value:'Adresse 1'},
					{key:'adresse2', value:'Adresse 2'},
					{key:'codePost', value:'Code postal'},
					{key:'ville', value:'Ville'},
					{key:'pays', value:'Pays'},
					{key:'situation', value:'Situation actuelle'}
				]},
				{key:'Formation', value: [
					{key:'diplomePostDUT', value:'Diplôme post-DUT'},
					{key:'formationPostDUT', value:'Formation Post-DUT'},
					{key:'formationEnCours', value:'Formation en cours'},
					{key:'ecole', value:'École'},
					{key:'diplomePrepare', value:'Diplôme préparé'}
				]},
				{key:'Entreprise', value: [
					{key:'entreprise', value:'Raison sociale'},
					{key:'codeAPE', value:'Code APE'},
					{key:'fonction', value:'Fonction'},
					{key:'telEntreprise', value:'Téléphone entreprise'},
					{key:'codePostEntreprise', value:'Code postal entreprise'},
					{key:'villeEntreprise', value:'Ville entreprise'},
					{key:'paysEntreprise', value:'Pays entreprise'},
					{key:'adresse1Entreprise', value:'Adresse 1 entreprise'},
					{key:'adresse2Entreprise', value:'Adresse 2 entreprise'},
					{key:'cedex', value:'Cedex'}
				]},
				{key:'Parents', value: [
					{key:'adresse1Parents', value:'Adresse 1 parents'},
					{key:'adresse2Parents', value:'Adresse 2 parents'},
					{key:'codePostParents', value:'Code postal parents'},
					{key:'villeParents', value:'Ville parents'},
					{key:'paysParents', value:'Pays parents'},
					{key:'situationParents', value:'Situation actuelle parents'},
					{key:'telMobParents', value:'Téléphone mobile parents'},
					{key:'telFixParents', value:'Téléphone fixe parents'}
				]}
			]
			**/

			function fillVal($value) {
				return ($value)?$value:'';
			}

			$output = '';
			$count = 1;
			foreach($csv as $line) {
				if($count<2)
					continue;

				$sexe = strtolower(fillVal($line[$order['sexe']]));
				if($sexe=='feminin' || $sexe=='fminin' || strrpos($sexe, 'f', -strlen($sexe)) !== FALSE)
					$sexe = 'f';
				if($sexe=='masculin' || strrpos($sexe, 'mas', -strlen($sexe)) !== FALSE)
					$sexe = 'm';

				/*$mobileParents = fillVal($line[$order['telMobParents']]);
				if (!empty($mobileParents) && !is_valid_phoneNumber ($mobileParents)) {
					$output .= '<p class="error">Valeur incorrecte pour le téléphone mobile des parents à la ligne '.$count.'</p>';
					$output .= '<input type="text" name="telMobParents_'.$count.'" value="'.$line[$order['telFix']].'" />';
				}

				$telParents = fillVal($line[$order['telFixParents']]);
				if (!empty($telParents) && !is_valid_phoneNumber ($telParents)) {
					$output .= '<p class="error">Valeur incorrecte pour le téléphone fixe des parents à la ligne '.$count.'</p>';
					$output .= '<input type="text" name="telFixParents_'.$count.'" value="'.$line[$order['telFixParents']].'" />';
				}

				$telMob = fillVal($line[$order['telMob']]);
				if (!empty($telMob) && !is_valid_phoneNumber ($telMob)) {
					$output .= '<p class="error">Valeur incorrecte pour le téléphone mobile de l\'ancien à la ligne '.$count.'</p>';
					$output .= '<input type="text" name="telMob_'.$count.'" value="'.$line[$order['telMob']].'" />';
				}

				$telFix = fillVal($line[$order['telFix']]);
				if (!empty($telFix) && !is_valid_phoneNumber ($telFix)) {
					$output .= '<p class="error">Valeur incorrecte pour le téléphone fixe de l\'ancien à la ligne '.$count.'</p>';
					$output .= '<input type="text" name="telFix_'.$count.'" value="'.$line[$order['telFix']].'" />';
				}*/

				$dateNais = fillVal($line[$order['dateNais']]);
				if (!empty($dateNais) && !is_valid_phoneNumber ($dateNais)) {
					$output .= '<p class="error">Valeur incorrecte pour la date-de-naissance à la ligne '.$count.'</p>';
					$output .= '<input type="text" name="dateNais_'.$count.'" value="'.$line[$order['dateNais']].'" />';
				}

				$mail = fillVal($line[$order['mail']]);
				if (!empty($mail) && !is_valid_phoneNumber ($mail)) {
					$output .= '<p class="error">Valeur incorrecte pour l\'e-mail à la ligne '.$count.'</p>';
					$output .= '<input type="text" name="mail_'.$count.'" value="'.$line[$order['mail']].'" />';
				}
				$count++;
			}

			if(!isset($_POST['submitFinal']) || $output!='')
				include(VIEWS_INC.'csv-apercu.php');
			else {
				$count = 0;
				foreach($csv as $line) {
					$count++;
					if($count<2)
						continue;

// 				echo $count.'<br />';

					/*
echo '<br />line : ';
					var_dump($line);
					echo '<br /><br />nomPat : '.fillVal($line[$order['nomPat']]).'<br /><br />';
					echo '<br /><br />';
*/



						/*
							echo '<td>'.$line[$order['nomPat']].'</td>';
							echo '<td>'.$line[$order['nomUsage']].'</td>';
							echo '<td>'.$line[$order['prenom']].'</td>';
							echo '<td>'.$line[$order['dateNais']].'</td>';
							echo '<td>'.$line[$order['mail']].'</td>';
							echo '<td>'.$line[$order['telMob']].'</td>';
							echo '<td>'.$line[$order['telFix']].'</td>';
							echo '<td>'.$line[$order['adresse1']].'</td>';
							echo '<td>'.$line[$order['codePost']].'</td>';
							echo '<td>'.$line[$order['ville']].'</td>';
							echo '<td>'.$line[$order['pays']].'</td>';
							echo '<td>'.$line[$order['diplomePostDUT']].'</td>';
							echo '<td>'.$line[$order['formationPostDUT']].'</td>';
							echo '<td>'.$line[$order['ecole']].'</td>';
							echo '<td>'.$line[$order['diplomePrepare']].'</td>';
							echo '<td>'.$line[$order['entreprise']].'</td>';
							echo '<td>'.$line[$order['telEntreprise']].'</td>';
							echo '<td>'.$line[$order['codePostEntreprise']].'</td>';
							echo '<td>'.$line[$order['cedex']].'</td>';
							echo '<td>'.$line[$order['adresse1Parents']].'</td>';
							echo '<td>'.$line[$order['codePostParents']].'</td>';
							echo '<td>'.$line[$order['telMobParents']].'</td>';
						*/



					$sexe = strtolower(fillVal($line[$order['sexe']]));
					if($sexe=='feminin' || $sexe=='fminin' || strrpos($sexe, 'f', -strlen($sexe)) !== FALSE)
						$sexe = 'f';
					if($sexe=='masculin' || strrpos($sexe, 'mas', -strlen($sexe)) !== FALSE)
						$sexe = 'm';

					$diplomeDUT = DiplomeDUTDAO::getByDepartement($departement);

					$parents = new Parents(0, fillVal($line[$order['adresse1Parents']]), fillVal($line[$order['adresse2Parents']]), fillVal($line[$order['codePostParent']]), fillVal($line[$order['villeParents']]), fillVal($line[$order['paysParents']]), fillVal($line[$order['telMobParents']]), fillVal($line[$order['telFixParents']]));

					$ancien = new Ancien(0, fillVal($line[$order['nomUsage']]), fillVal($line[$order['nomPat']]), fillVal($line[$order['prenom']]), fillVal($line[$order['adresse1']]), fillVal($line[$order['adresse2']]), fillVal($line[$order['codePost']]), fillVal($line[$order['ville']]), fillVal($line[$order['pays']]), fillVal($line[$order['telMob']]), fillVal($line[$order['telFix']]), null, null, $parents, $sexe, fillVal($line[$order['dateNais']]), fillVal($line[$order['mail']]));

					$idAncien=AncienDAO::create($ancien);

					$typeProfile = TypeProfilDAO::getByLibelle('Ancien');

					$login = Compte::personne2LoginStr($ancien);

					/*
var_dump($ancien);
					echo '<br />';
*/

					$account = new Compte($idAncien, $typeProfile, $ancien, $login, randomPassword());
					/*
echo '	Login -> '.$login;
					echo '<br />';
*/

					CompteDAO::create($account);

					if($diplomeDUT!=NULL) {
						$aEtudie = new AEtudie($ancien, $diplomeDUT, $departement, $promotion);
						AEtudieDAO::create($aEtudie);
					}
				}
				include(VIEWS_INC.'csv-imported.php');
			}
		} else {
			// Pas le temps de mettre dans la vue_ Désolé_ T.T  J'irai me punir_
			echo '<div id="content"><p class="warning">Vous devez sélectionner une promotion et un département.</p></section>';
		}

	} else
		include(VIEWS_INC.'csv-import.php');
} else
		include(VIEWS_INC.'403.php');

?>
