<?php
if ($_SESSION['user_auth']['write']) {
	include_once('validate.transit.inc.php');
	if (isset($_GET['id']))
		$etablissement = EtablissementDAO::getById($_GET['id']);

	function validate ($etablissement) {
		$valid = array();
		if (isset($_POST['name']) && trim($_POST['name']) != $etablissement->getNom()) {
			if (!contains_numeric($_POST['name']))
				$valid['name'] = true;
			else
				$valid['name'] = false;
		}
		if (isset($_POST['address1']) && trim($_POST['address1']) != $etablissement->getAdresse1())
			$valid['address1'] = true;
		if (isset($_POST['address2']) && trim($_POST['address2']) != $etablissement->getAdresse2())
			$valid['address2'] = true;
		if (isset($_POST['postalCode']) && trim($_POST['postalCode']) != $etablissement->getCodePostal())
			$valid['postalCode'] = true;
		if (isset($_POST['city']) && trim($_POST['city']) != $etablissement->getVille()) {
			if (!contains_numeric($_POST['city']))	//	Si il n'y a pas de chiffres
				$valid['city'] = true;
			else
				$valid['city'] = false;
		}
		if (isset($_POST['country']) && trim($_POST['country']) != $etablissement->getPays()) {
			if (!contains_numeric($_POST['country']))	//	Si il n'y a pas de chiffres
				$valid['country'] = true;
			else
				$valid['country'] = false;
		}
		if (isset($_POST['fax']) && trim($_POST['fax']) != $etablissement->getFax()) {
				$valid['fax'] = true;
		}
		if (isset($_POST['web']) && trim($_POST['web']) != $etablissement->getWeb()) {
				$valid['web'] = true;
		}
		if (isset($_POST['country']) && trim($_POST['country']) != $etablissement->getPays()) {
			if (!contains_numeric($_POST['country']))	//	Si il n'y a pas de chiffres
				$valid['country'] = true;
			else
				$valid['country'] = false;
		}
		return $valid;
	}
	if(!empty($_POST) && $etablissement != NULL) {
		$valid = validate($etablissement);
		if ($valid['name']) {
			$etablissement->setNom($_POST['name']);
			$change = true;
		}
		if ($valid['address1']) {
			$etablissement->setAdresse1($_POST['address1']);
			$change = true;
		}
		if ($valid['address2']) {
			$etablissement->setAdresse2($_POST['address2']);
			$change = true;
		}
		if ($valid['postalCode']) {
			$etablissement->setCodePostal($_POST['postalCode']);
			$change = true;
		}
		if ($valid['city']) {
			$etablissement->setVille($_POST['city']);
			$change = true;
		}
		if ($valid['country']) {
			$etablissement->setPays($_POST['country']);
			$change = true;
		}
		if ($valid['fax']) {
			$etablissement->setFax($_POST['fax']);
			$change = true;
		}
		if ($valid['web']) {
			$etablissement->setWeb($_POST['wb']);
			$change = true;
		}
		
		if ($change) {
			EtablissementDAO::update($etablissement);
			header('Location: '.SELF.'etablissements');
		}
	}
	include(VIEWS_INC.'etablissement-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>