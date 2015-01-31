<?php
include_once('validate.transit.inc.php');
$lstPays=getListePaysMonde();
$codesAPE = CodeAPEDAO::getAll();
$libelleTypeProfil = $_SESSION['syntheseUser']->getTypeProfil()->getLibelle();

if (isset($_POST) && $_POST != NULL) {
	if ($_POST['name'] != NULL && $_POST['address1'] != NULL  && $_POST['postalCode'] != NULL && $_POST['city'] != NULL && $_POST['country'] != NULL && $_POST['APEcode'] != NULL) {
		if ($_POST['cedex'] == NULL || is_numeric($_POST['cedex'])) {
			if ($_POST['phoneNumber'] == NULL || is_valid_phoneNumber($_POST['phoneNumber'])) {
				$entreprise = new Entreprise(0, $_POST['name'], $_POST['address1'], $_POST['address2'], $_POST['postalCode'], $_POST['city'], $_POST['cedex'], $_POST['country'], $_POST['phoneNumber'], $_POST['APEcode']);
				EntrepriseDAO::create($entreprise);
				header('Location: '.SELF.'entreprises');
			} else {
				$errorPhone = true;
			}
		} else {
			$errorCedex = true;
		}
	} else {
		$error = true;
	}

}

include(VIEWS_INC.'entreprise-ajouter.php');

?>