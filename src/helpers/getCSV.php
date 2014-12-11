<?php
require_once('csvParser.inc.php');

if(!empty($_GET['file'])) {
	if($_GET['delimiter']=='tab')
		$_GET['delimiter']='\t';
	$array = csv2array($_GET['file'], $_GET['nbLines'], $_GET['delimiter']);
	echo json_encode(array_values($array));
}
?>