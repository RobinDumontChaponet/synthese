<?php
	$domaines = DomaineDAO::getAll();
	
	if(isset ($_POST) && $_POST != NULL) {
		if ($_POST['libelle'] != NULL && $_POST['domaine'] != NULL) {
			$domaine = new Domaine($_POST['domaine'], NULL, NULL);
			$diplome = new DiplomePostDUT(0, $_POST['libelle'], $domaine);
			var_dump($diplome);
			DiplomePostDUTDAO::create($diplome);
			header('Location: '.SELF.'diplomes');
		} else {
			$error = true;
		}
	}

	include(VIEWS_INC.'diplome-ajouter.php');
?>