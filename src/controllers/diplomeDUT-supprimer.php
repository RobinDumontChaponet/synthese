<?php
if ($_SESSION['user_auth']['write']) {

	if ($_GET['id']) {
		$diplomeDUT = new DiplomeDUT($_GET['id'], NULL, NULL);
		DiplomeDUTDAO::delete($diplomeDUT);
		header('Location: '.SELF.'diplomesDUT');
	}
} else {
	include(VIEWS_INC.'403.php');
}
?>
