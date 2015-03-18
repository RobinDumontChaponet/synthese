<?php
if ($_SESSION['user_auth']['write']) {
	require_once(MODELS_INC.'CodeAPEDAO.class.php');
    require_once('lstPays.php');
	$entreprise = EntrepriseDAO::getById($_GET['id']);
	$lstPays=getListePaysMonde();
	$lstCodeApe=CodeAPEDAO::getAll();

	if (!empty($_POST) && $entreprise != NULL) {
		if (trim($_POST['entrepriseNom'])!="") {
			if ($_POST['cedex'] == NULL || is_numeric($_POST['cedex'])) {
				$entreprise->setCedex(trim($_POST['cedex']));
			}
			$entreprise->setNom(trim($_POST['entrepriseNom']));
			$entreprise->setAdresse1(trim($_POST['entrepriseAd1']));
			$entreprise->setAdresse2(trim($_POST['entrepriseAd2']));
			$entreprise->setCodePostal(trim($_POST['entrepriseCp']));
			$entreprise->setVille(trim($_POST['entrepriseVille']));
			$entreprise->setPays(trim($_POST['entreprisePays']));
			$code=CodeAPEDAO::getById(trim($_POST['entrepriseCodeApe']));
			if ($code!=null) {
				$entreprise->setCodeAPE($code);
			} else {
				$entreprise->setCodeAPE(new CodeAPE(0, "Non renseigné"));
			}
			EntrepriseDAO::update($entreprise);
			//header('Location: '.SELF.'entreprises');
		} else {
			$error="Nom de l'entreprise incorrecte";
		}

	}
	include(VIEWS_INC.'entreprise-editer.php');
} else {
	include(VIEWS_INC.'403.php');
}
