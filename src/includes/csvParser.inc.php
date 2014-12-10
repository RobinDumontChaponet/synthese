<?php

include_once('conf.inc.php');

ini_set("auto_detect_line_endings", true);

/**
 * csv2array function.
 *
 * @access public
 * @param mixed $src
 * @param mixed $lineNb
 * @return void
 */
function csv2array ($src, $lineNb=0, $delimiter=';') {
	$handle = fopen(DATA_PATH.'csv/'.$src,'r');
	$i=0;
	$lineNb=(is_numeric($lineNb) && $lineNb>0)?$lineNb:0;
	$array = array();
	while(($line = fgetcsv($handle, 0, $delimiter)) && ($i<$lineNb || $lineNb==0)) {
		$row= array();
		foreach($line as $value)
			$row[]=$value;
		$array[]=$row;
		$i++;
	}
	fclose($handle);
	return $array;
}
?>