<?php
include_once('validate.transit.inc.php');

$valid = NULL;
$change = 0;

function validate ($ancien) {
	$valid = array();
	if (isset($_POST['lastName']) && trim($_POST['lastName']) != $ancien->getNom()) {
		if (!contains_numeric($_POST['lastName']))
			$valid['lastName'] = 1;
		else
			$valid['lastName'] = 0;
	}
	if (isset($_POST['address1']) && trim($_POST['address1']) != $ancien->getAdresse1())
		$valid['address1'] = 1;
	if (isset($_POST['address2']) && trim($_POST['address2']) != $ancien->getAdresse2())
		$valid['address2'] = 1;
	if (isset($_POST['postalCode'])&& trim($_POST['postalCode']) != $ancien->getCodePostal())
		$valid['postalCode'] = 1;
	if (isset($_POST['city']) && trim($_POST['city']) != $ancien->getVille()) {
		if (!contains_numeric($_POST['city']))
			$valid['city'] = 1;
		else
			$valid['city'] = 0;
	}
	if (isset($_POST['country']) && trim($_POST['country']) != $ancien->getPays()) {
		if (!contains_numeric($_POST['country']))
			$valid['country'] = 1;
		else
			$valid['country'] = 0;
	}
	if (isset($_POST['phoneNumber'])&& trim($_POST['phoneNumber']) != $ancien->getTelephone()) {
		if (is_valid_phoneNumber($_POST['phoneNumber']) || $_POST['phoneNumber'] == '')
			$valid['phoneNumber'] = 1;
		else
			$valid['phoneNumber'] = 0;
	}
	if (isset($_POST['mobileNumber'])&& trim($_POST['mobileNumber']) != $ancien->getMobile()) {
		if (is_valid_phoneNumber($_POST['mobileNumber']) || $_POST['mobileNumber'] == '')
			$valid['mobileNumber'] = 1;
		else
			$valid['mobileNumber'] = 0;
	}
	if (isset($_POST['mailAddress'])&& trim($_POST['mailAddress']) != $ancien->getMail()) {
		if (is_valid_email($_POST['mailAddress'])) //|| $_POST['mailAddress'] == ''
			$valid['mailAddress'] = 1;
		else
			$valid['mailAddress'] = 0;
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
	if ($valid['lastName']) {
		$ancien->setNom($_POST['lastName']);
		$change = 1;
	}
	if ($valid['address1']) {
		$ancien->setAdresse1($_POST['address1']);
		$change = 1;
	}
	if ($valid['address2']) {
		$ancien->setAdresse2($_POST['address2']);
		$change = 1;
	}
	if ($valid['postalCode']) {
		$ancien->setCodePostal($_POST['postalCode']);
		$change = 1;
	}
	if ($valid['city']) {
		$ancien->setVille($_POST['city']);
		$change = 1;
	}
	if ($valid['phoneNumber']) {
		$ancien->setTelephone($_POST['phoneNumber']);
		$change = 1;
	}
	if ($valid['mobileNumber']) {
		$ancien->setMobile($_POST['mobileNumber']);
		$change = 1;
	}
	if ($valid['mailAddress']) {
		$ancien->setMail($_POST['mailAddress']);
		$change = 1;
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
include(VIEWS_INC.'profil.php');
?>
