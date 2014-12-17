<?php
header('Content-Type: text/plain; charset=utf-8');

mb_internal_encoding("UTF-8");
    mb_http_output( "UTF-8" );
    ob_start("mb_output_handler");

require_once('csvParser.inc.php');

if(!empty($_GET['file'])) {
	if($_GET['delimiter']=='tab')
		$_GET['delimiter']='\t';
	$array = csv2array($_GET['file'], 0, $_GET['nbLines'], $_GET['delimiter']);
	echo json_encode(array_values($array));
}
?>