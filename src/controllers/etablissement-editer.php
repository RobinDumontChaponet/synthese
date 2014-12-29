<?php

if (isset($_GET['id']))
	$etablissement = EtablissementDAO::getById($_GET['id']);

function validate ($etablissement) {
	$valid = array();
	
	return $valid;
}
if(!empty($_POST) && $etablissement != NULL) {
	$valid = validate($etablissement);
}
include(VIEWS_INC.'etablissement-editer.php');

?>