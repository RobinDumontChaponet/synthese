<?php
if ($_SESSION['user_auth']['write']) {
	if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idDiplomeDUT'] != NULL && $_GET['idDepartement'] != NULL && $_GET['idPromotion'] !=NULL) {
		$ancien = AncienDAO::getById($_GET['idAncien']);
		$promotion = PromotionDAO::getById($_GET['idPromotion']);
		$diplomesDUT = DiplomeDUTDAO::getDiplomeDutNotHave($ancien);
		$diplDUT = new DiplomeDUT ($_GET['idDiplomeDUT'], NULL, NULL, NULL);
		$departIUT = new DepartementIUT ($_GET['idDepartement'], NULL, NULL);
		$exDiplAncien = new AEtudie ($ancien, $diplDUT, $departIUT, $promotion);
		if (isset($_POST) && $_POST != NULL) {
			$diplomeDUT = new DiplomeDUT ($_POST['diplome'][0], NULL, NULL, NULL);
			$departementIUT = new DepartementIUT ($_POST['diplome'][1], NULL, NULL);
			if (isset($_POST['promotion']) && $_POST['promotion'] != NULL) {
				$promo = PromotionDAO::getByAnnee($_POST['promotion']); // Faire une verif et créer si non existante
				if ($promo != NULL) {
					$diplAncien = new AEtudie ($ancien, $diplomeDUT, $departementIUT, $promo);
				} else {
					$promotion = new promotion(0, $_POST['promotion']);
					PromotionDAO::create($promotion);
				}
				AEtudieDAO::update($exDiplAncien, $diplAncien);	
				header('Location: '.SELF.'profil-editer/'.$ancien->getId().'#diplomes');
			}
		}
	}
	/*if ($_GET['idAncien']) {
		
		
		if (isset($_POST) && $_POST != NULL) {
			if ($_POST['diplome']) {
				if ($valid) {
					
					
				}
				
			}
		}
	}*/
	include(VIEWS_INC.'diplomeDUT-modifier.php');
} else {
	include(VIEWS_INC.'403.php');
}
?>