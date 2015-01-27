<?php

include_once('conf.inc.php');

ini_set("auto_detect_line_endings", true);
setlocale(LC_ALL, 'fr_FR.UTF-8');
mb_internal_encoding('UTF-8');

function csvstring_to_array(&$string, $CSV_SEPARATOR = ';', $CSV_ENCLOSURE = '"', $CSV_LINEBREAK = "\n") {
	$o = array();

	$cnt = mb_strlen($string);
	$esc = false;
	$escesc = false;
	$num = 0;
	$i = 0;
	$l = 0;
	while ($i < $cnt) {
		$s = $string[$i];

		if ($s == $CSV_LINEBREAK) {
			if ($esc) {
				$o[$l][$num] .= $s;
			} else {
				$i++;
				$l++;
				break;
			}
		} elseif ($s == $CSV_SEPARATOR) {
			if ($esc) {
				$o[$l][$num] .= $s;
			} else {
				$num++;
				$esc = false;
				$escesc = false;
			}
		} elseif ($s == $CSV_ENCLOSURE) {
			if ($escesc) {
				$o[$l][$num] .= $CSV_ENCLOSURE;
				$escesc = false;
			}

			if ($esc) {
				$esc = false;
				$escesc = true;
			} else {
				$esc = true;
				$escesc = false;
			}
		} else {
			if ($escesc) {
				$o[$l][$num] .= $CSV_ENCLOSURE;
				$escesc = false;
			}
			$o[$l][$num] .= $s;
		}
		$i++;
	}
	//$string = substr($string, $i);
	return $o;
}

/*function csv2array($src, $start=0, $lineNb=0, $delimiter=';') {
	$handle = fopen(DATA_PATH.'csv/'.$src,'r');

	fseek($handle, ($start<0)?0:$start);

	$str='';
	$i=0;
	while(($line = fgets($handle)) && ($i<$lineNb || $lineNb==0)) {
		$str.=$line."\n";
		$i++;
	}

	//$str = utf8_encode($str);

	//$str = iconv('Windows-1252', 'UTF-8//TRANSLIT', $str);
	//if(!mb_check_encoding($str, 'UTF-8') OR !($str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32')))
		//$str = mb_convert_encoding($str, 'UTF-8');
	$str = iconv('ISO-8859-1', 'UTF-8//TRANSLIT', $str);

	$str = utf8_encode($str);

	$enc = mb_detect_encoding($str, mb_list_encodings(), true);

	return csvstring_to_array($str);
}*/


require_once('parsecsv.lib.php');

function csv2array($src, $start=0, $lineNb=0, $delimiter=NULL) {
	$csv = new parseCSV();
	if ($lineNb>0)
		$csv->limit = $lineNb-1;

	$csv->encoding('ISO-8859-1', 'UTF-8//TRANSLIT');
	if (empty($delimiter))
		$csv->auto(DATA_PATH.'csv/'.$src);
	else {
		$csv->delimiter = $delimiter;
		$csv->parse(DATA_PATH.'csv/'.$src);
	}

	$array = array();

	if ($start<0)
		$start=0;

	if ($start==0) {
		$row = array();
		foreach ($csv->titles as $value)
			$row[]=$value;
		$array[]=$row;
	}

	$data = new LimitIterator(new ArrayIterator($csv->data), ($start>0)?$start-1:0);
	foreach ($data as $key => $line) {
		$row = array();
		foreach ($line as $value) {
			$row[]=$value;
		}
		$array[]=$row;
	}

	return $array;
}

/*function csv2array($src, $start=0, $lineNb=0, $delimiter=NULL) {
	$handle = fopen(DATA_PATH.'csv/'.$src,'r');

	fseek($handle, ($start<0)?0:$start);

	$str='';
	$i=0;
	while(($line = fgets($handle)) && ($i<$lineNb || $lineNb==0)) {
		$str.=$line."\n";
		$i++;
	}

	if(!mb_check_encoding($str, 'UTF-8') OR !($str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32')))
		$str = mb_convert_encoding($str, 'UTF-8');

	$fp = fopen('php://memory', 'rw');
	fwrite($fp, (string)$str);
	rewind($fp);

	while(($line = fgets($handle)) && ($i<$lineNb || $lineNb==0)) {
		$str.=$line."\n";
		$i++;
	}
	//$str = iconv('Windows-1252', 'UTF-8//TRANSLIT', $str);
	return csvstring_to_array($str);
}*/

/*function csv2array($src, $start=0, $lineNb=0, $delimiter=';') {
	$handle = fopen(DATA_PATH.'csv/'.$src,'r');
	fseek($handle, ($start<0)?0:$start);

	$str='';
	$i=0;
	while(($line = fgets($handle)) && ($i<$lineNb || $lineNb==0)) {
		$str.=$line."\n";
		$i++;
	}

	if(!mb_check_encoding($str, 'UTF-8') OR !($str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32')))
		$str = mb_convert_encoding($str, 'UTF-8');

	$handle = fopen('php://memory', 'rw');
	fwrite($handle, (string)$str);
	rewind($handle);

	if(empty($delimiter))
		$delimiter=';';

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
}*/

/*ini_set("auto_detect_line_endings", true);
setlocale(LC_ALL, 'fr_FR.UTF-8');

/**
 * csv2array function.
 *
 * @access public
 * @param mixed $src
 * @param mixed $lineNb
 * @param mixed $delimiter
 * @return void
 */
/*
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
}*/
?>