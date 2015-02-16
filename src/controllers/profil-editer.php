<?php
include_once('validate.transit.inc.php');
require_once('lstPays.php');
$listPays=getListePaysMonde();
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
    if (isset($_POST['address1']) && trim($_POST['address1']) != $ancien->getAdresse2())
		$valid['address1'] = true;
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

    if (isset($_POST['address1Parent']) && trim($_POST['address1Parent']) != $ancien->getParents()->getAdresse2())
		$valid['address1Parent'] = true;
	if (isset($_POST['address2Parent']) && trim($_POST['address2Parent']) != $ancien->getParents()->getAdresse2())
		$valid['address2Parent'] = true;
	if (isset($_POST['postalCodeParent']) && trim($_POST['postalCodeParent']) != $ancien->getParents()->getCodePostal())
		$valid['postalCodeParent'] = true;
	if (isset($_POST['cityP']) && trim($_POST['cityParent']) != $ancien->getParents()->getVille()) {
		if (!contains_numeric($_POST['cityParent']))	//	Si il n'y a pas de chiffres
			$valid['cityParent'] = true;
		else
			$valid['cityParent'] = false;
	}
	if (isset($_POST['countryParent']) && trim($_POST['countryParent']) != $ancien->getParents()->getPays()) {
		if (!contains_numeric($_POST['countryParent']))	//	Si il n'y a pas de chiffres
			$valid['countryParent'] = true;
        else
			$valid['countryParent'] = false;
	}
	if (isset($_POST['phoneNumberParent']) && trim($_POST['phoneNumberP']) != $ancien->getParents()->getTelephone()) {
		if (is_valid_phoneNumber($_POST['phoneNumberParent']) || $_POST['phoneNumberParent'] == '')
			$valid['phoneNumberParent'] = true;
		else
			$valid['phoneNumberParent'] = false;
	}
	if (isset($_POST['mobileNumberParent']) && trim($_POST['mobileNumberP']) != $ancien->getParents()->getMobile()) {
		if (is_valid_phoneNumber($_POST['mobileNumberParent']) || $_POST['mobileNumberParent'] == '')
			$valid['mobileNumberParent'] = true;
		else
			$valid['mobileNumberParent'] = false;
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
		$valid['birthday'] = true;
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
	if (isset($valid['lastName']) && $valid['lastName']==true) {
		$ancien->setNom($_POST['lastName']);
		$change = true;
	}
	if (isset($valid['address1']) && $valid['address1']==true) {
		$ancien->setAdresse1($_POST['address1']);
		$change = true;
	}
	if (isset($valid['address2']) && $valid['address2']=true) {
		$ancien->setAdresse2($_POST['address2']);
		$change = true;
	}
	if (isset($valid['postalCode']) && $valid['postalCode']==true) {
		$ancien->setCodePostal($_POST['postalCode']);
		$change = true;
	}
	if (isset($valid['city']) && $valid['city']==true) {
		$ancien->setVille($_POST['city']);
		$change = true;
	}
    if (isset($valid['country']) && $valid['country']==true) {
		$ancien->setPays($_POST['country']);
		$change = true;
	}
	if (isset($valid['phoneNumber']) && $valid['phoneNumber']==true) {
		$ancien->setTelephone($_POST['phoneNumber']);
		$change = true;
	}
	if (isset($valid['mobileNumber']) && $valid['mobileNumber']==true) {
		$ancien->setMobile($_POST['mobileNumber']);
		$change = true;
	}
    //Parents
    if (isset($valid['address1P']) && $valid['address1P']==true) {
		$ancien->getParents()->setAdresse1($_POST['address1P']);
		$change = true;
	}
	if (isset($valid['address2P']) && $valid['address2P']=true) {
		$ancien->getParents()->setAdresse2($_POST['address2P']);
		$changeP = true;
	}
	if (isset($valid['postalCodeP']) && $valid['postalCodeP']==true) {
		$ancien->getParents()->setCodePostal($_POST['postalCodeP']);
		$changeP = true;
	}
	if (isset($valid['cityP']) && $valid['cityP']==true) {
		$ancien->getParents()->setVille($_POST['cityP']);
		$changeP = true;
	}
    if (isset($valid['countryP']) && $valid['countryP']==true) {
		$ancien->getParents()->setPays($_POST['countryP']);
		$changeP = true;
	}
	if (isset($valid['phoneNumberP']) && $valid['phoneNumberP']==true) {
		$ancien->getParents()->setTelephone($_POST['phoneNumberP']);
		$changeP = true;
	}
	if (isset($valid['mobileNumberP']) && $valid['mobileNumberP']==true) {
		$ancien->getParents()->setMobile($_POST['mobileNumberP']);
		$changeP = true;
	}
    //fin parents
	if (isset($valid['mailAddress']) && $valid['mailAddress']==true) {
		$ancien->setMail($_POST['mailAddress']);
		$change = true;
	}
	if (isset($valid['sex']) && $valid['sex']==true) {
		$ancien->setSexe($_POST['sex']);
		$change = true;
	}
	if (isset($valid['name']) && $valid['name']==true) {
		$ancien->setNomPatronymique($_POST['name']);
		$change = true;
	}
	if (isset($valid['firstName']) && $valid['firstName']==true) {
		$ancien->setPrenom($_POST['firstName']);
		$change = true;
	}
	if (isset($valid['birthday']) && $valid['birthday']==true) {
		$ancien->setDateNaissance($_POST['birthday']);
		$change = true;
	}
	if ($change)
		AncienDAO::update($ancien);
    if ($changeP)
        ParentsDAO::update($ancien->getParents());
}

if ($ancien != NULL) {
	$imageProfil = $ancien->getImageProfil();
	$imageTrombi = $ancien->getImageTrombi();
	$diplomesDUT = AEtudieDAO::getByAncien($ancien);
	$diplomesPost = PossedeDAO::getByAncien($ancien);
	$entreprises = TravailleDAO::getByAncien($ancien);
	$spes = EstSpecialiseDAO::getByAncien($ancien);
}
include(VIEWS_INC.'profil-editer.php');

?>
