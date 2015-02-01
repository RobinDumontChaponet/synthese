<?php 
	if (isset($_POST) && $_POST != NULL) {
		if ($_POST['name'] != NULL) {
			$poste = new Poste(0, $_POST['name']);
			PosteDAO::create($poste);
			header('Location: '.SELF.'postes');
		}
	}
	include(VIEWS_INC.'poste-ajouter.php');
?>