<?php
include_once('validate.transit.inc.php');

$valid = NULL;
$change = false;

function validate ($ancien) {
	$valid = array();
	if (isset($_POST['lastName']) && trim($_POST['lastName']) != $ancien->getNom()) {
		if (!contains_numeric($_POST['lastName']))	//	Si il n'y a pas de chiffres
			$valid['lastName'] = true;
		else
			$valid['lastName'] = false;
	}
	if (isset($_POST['name']) && trim($_POST['name']) != $ancien->getNomPatronymique()) {
		if (!contains_numeric($_POST['name']))	//	Si il n'y a pas de chiffres
			$valid['name'] = true;
		else
			$valid['name'] = false;
	}
	if (isset($_POST['firstName']) && trim($_POST['firstName']) != $ancien->getPrenom()) {
		if (!contains_numeric($_POST['firstName']))	//	Si il n'y a pas de chiffres
			$valid['firstName'] = true;
		else
			$valid['firstName'] = false;
	}
	if (isset($_POST['addresstrue']) && trim($_POST['addresstrue']) != $ancien->getAdressetrue())
		$valid['addresstrue'] = true;
	if (isset($_POST['address2']) && trim($_POST['address2']) != $ancien->getAdresse2())
		$valid['address2'] = true;
	if (isset($_POST['postalCode']) && trim($_POST['postalCode']) != $ancien->getCodePostal())
		$valid['postalCode'] = true;
	if (isset($_POST['city']) && trim($_POST['city']) != $ancien->getVille()) {
		if (!contains_numeric($_POST['city']))	//	Si il n'y a pas de chiffres
			$valid['city'] = true;
		else
			$valid['city'] = false;
	}
	if (isset($_POST['country']) && trim($_POST['country']) != $ancien->getPays()) {
		if (!contains_numeric($_POST['country']))	//	Si il n'y a pas de chiffres
			$valid['country'] = true;
		else
			$valid['country'] = false;
	}
	if (isset($_POST['phoneNumber']) && trim($_POST['phoneNumber']) != $ancien->getTelephone()) {
		if (is_valid_phoneNumber($_POST['phoneNumber']) || $_POST['phoneNumber'] == '')
			$valid['phoneNumber'] = true;
		else
			$valid['phoneNumber'] = false;
	}
	if (isset($_POST['mobileNumber']) && trim($_POST['mobileNumber']) != $ancien->getMobile()) {
		if (is_valid_phoneNumber($_POST['mobileNumber']) || $_POST['mobileNumber'] == '')
			$valid['mobileNumber'] = true;
		else
			$valid['mobileNumber'] = false;
	}
	if (isset($_POST['mailAddress']) && trim($_POST['mailAddress']) != $ancien->getMail()) {
		if (is_valid_email($_POST['mailAddress']))
			$valid['mailAddress'] = true;
		else
			$valid['mailAddress'] = false;
	}
	if (isset($_POST['sex']) && trim($_POST['sex']) != $ancien->getSexe())
		$valid['sex'] = true;
	if (isset($_POST['birthday']) && trim($_POST['birthday']) != $ancien->getDateNaissance()) {
		if (is_valid_SQL_date($_POST['birthday']))
			$valid['birthday'] = true;
		else
			$valid['birthday'] = false;
	}
	return $valid;
}
if (isset($_GET['id']))
	$personne = PersonneDAO::getById($_GET['id']);
else
	$personne = PersonneDAO::getById($_SESSION[syntheseUser]->getId());
	
if ($personne != NULL)
	$ancien = AncienDAO::getById($personne->getId());
	
if(!empty($_POST) && $ancien != NULL) {
	$valid = validate($ancien);
	
	//	Test : Si changement OK -> on attribut la valeur à $ancien -> on signifie qu'il y a changement
	if ($valid['lastName']) {
		$ancien->setNom($_POST['lastName']);
		$change = true;
	}
	if ($valid['addresstrue']) {
		$ancien->setAdressetrue($_POST['addresstrue']);
		$change = true;
	}
	if ($valid['address2']) {
		$ancien->setAdresse2($_POST['address2']);
		$change = true;
	}
	if ($valid['postalCode']) {
		$ancien->setCodePostal($_POST['postalCode']);
		$change = true;
	}
	if ($valid['city']) {
		$ancien->setVille($_POST['city']);
		$change = true;
	}
	if ($valid['phoneNumber']) {
		$ancien->setTelephone($_POST['phoneNumber']);
		$change = true;
	}
	if ($valid['mobileNumber']) {
		$ancien->setMobile($_POST['mobileNumber']);
		$change = true;
	}
	if ($valid['mailAddress']) {
		$ancien->setMail($_POST['mailAddress']);
		$change = true;
	}
	if ($valid['sex']) {
		$ancien->setSexe($_POST['sex']);
		$change = true;
	}
	if ($valid['name']) {
		$ancien->setNomPatronymique($_POST['name']);
		$change = true;
	}
	if ($valid['firstName']) {
		$ancien->setPrenom($_POST['firstName']);
		$change = true;
	}
	if ($valid['birthday']) {
		$ancien->setDateNaissance($_POST['birthday']);
		$change = true;
	}
	if ($change)
		AncienDAO::update($ancien);
}

if ($ancien != NULL) {
	$imageProfil = $ancien->getImageProfil();
	$imageTrombi = $ancien->getImageTrombi();
	$diplomeDUT = AEtudieDAO::getByAncien($ancien);
	$diplomesPost = PossedeDAO::getByAncien($ancien);
	$entreprises = TravailleDAO::getByAncien($ancien);
}
include(VIEWS_INC.'profil-editer.php');
?>
