<?php 
	require_once('lstPays.php');
	$lstPays=getListePaysMonde();
	if (isset($_POST) && $_POST != NULL) {
		if ($_POST['name'] != NULL && $_POST['address1'] != NULL && $_POST['city'] != NULL) {
			$etablissement = new Etablissement(0, $_POST['name'], $_POST['address1'], $_POST['address2'], $_POST['postalCode'], $_POST['city'], $_POST['country'], $_POST['fax'], $_POST['web']);
			EtablissementDAO::create($etablissement);
			header('Location: '.SELF.'etablissements');
		} else {
			$error = true;
		}
	}
	include(VIEWS_INC.'etablissement-ajouter.php');
?>