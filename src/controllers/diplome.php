<?php
	if (isset($_GET['id']))
		$diplomes = PossedeDAO::getById($_GET['id']);

include(VIEWS_INC.'diplome.php');
?>