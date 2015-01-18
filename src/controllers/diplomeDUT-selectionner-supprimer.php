<?php
if ($_SESSION['user_auth']['write']) {
	
	if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idDiplomeDUT'] != NULL && $_GET['idDepartement'] != NULL && $_GET['idPromotion'] !=NULL) {
		$ancien = new Ancien($_GET['idAncien'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		$diplomeDUT = new DiplomeDUT ($_GET['idDiplomeDUT'], NULL, NULL);
		$departementIUT = new DepartementIUT ($_GET['idDepartement'], NULL, NULL);
		$promotion = PromotionDAO::getById($_GET['idPromotion']);
		$diplAncien = new AEtudie ($ancien, $diplomeDUT, $departementIUT, $promotion);
		AEtudieDAO::delete($diplAncien);
		header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#diplomes');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>