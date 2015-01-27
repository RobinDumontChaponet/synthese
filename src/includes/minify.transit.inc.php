<?php

// minify, from razorsharpcode.blogspot.fr
function minify($src) {
	$time=microtime(TRUE);
	$out='';
	$ptr=0;
	while ($ptr<=strlen($src)) {
		if ($src[$ptr]=='/') {
			// Let's presume it's a regex pattern
			$regex=TRUE;
			if ($ptr>0) {
				// Backtrack and validate
				$ofs=$ptr;
				while ($ofs>0) {
					$ofs--;
					// Regex pattern should be preceded by parenthesis, colon or assignment operator
					if ($src[$ofs]=='(' || $src[$ofs]==':' || $src[$ofs]=='=') {
						while ($ptr<=strlen($src)) {
							$str=strstr(substr($src, $ptr+1), '/', TRUE);
							if (!strlen($str) && $src[$ptr-1]!='/' || strpos($str, "\n")) {
								// Not a regex pattern
								$regex=FALSE;
								break;
							}
							$out .= '/'.$str;
							$ptr+=strlen($str)+1;
							// Continue pattern matching if / is preceded by a \
							if ($src[$ptr-1]!='\\' || $src[$ptr-2]=='\\') {
								$out .= '/';
								$ptr++;
								break;
							}
						}
						break;
					}
					elseif ($src[$ofs]!="\t" && $src[$ofs]!=' ') {
						// Not a regex pattern
						$regex=FALSE;
						break;
					}
				}
				if ($regex && _ofs<1)
					$regex=FALSE;
			}
			if (!$regex || $ptr<1) {
				if (substr($src, $ptr+1, 2)=='*@') {
					// JS conditional block statement
					$str=strstr(substr($src, $ptr+3), '@*/', TRUE);
					$out .= '/*@'.$str.$src[$ptr].'@*/';
					$ptr+=strlen($str)+6;
				}
				elseif ($src[$ptr+1]=='*') {
					// Multiline comment
					$str=strstr(substr($src, $ptr+2), '*/', TRUE);
					$ptr+=strlen($str)+4;
				}
				elseif ($src[$ptr+1]=='/') {
					// Multiline comment
					$str=strstr(substr($src, $ptr+2), "\n", TRUE);
					$ptr+=strlen($str)+2;
				}
				else {
					// Division operator
					$out .= $src[$ptr];
					$ptr++;
				}
			}
			continue;
		}
		elseif ($src[$ptr]=='\'' || $src[$ptr]=='"') {
			$match=$src[$ptr];
			// String literal
			while ($ptr<=strlen($src)) {
				$str=strstr(substr($src, $ptr+1), $src[$ptr], TRUE);
				$out .= $match.$str;
				$ptr+=strlen($str)+1;
				if ($src[$ptr-1]!='\\' || $src[$ptr-2]=='\\') {
					$out .= $match;
					$ptr++;
					break;
				}
			}
			continue;
		}
		if ($src[$ptr]!="\r" && $src[$ptr]!="\n" && ($src[$ptr]!="\t" && $src[$ptr]!=' ' || preg_match('/[\w\$]/', $src[$ptr-1]) && preg_match('/[\w\$]/', $src[$ptr+1]))) // Ignore whitespaces
			$out .= str_replace("\t", ' ', $src[$ptr]);
		$ptr++;
	}
	return $out . '/* Compressed in '.round(microtime(TRUE)-$time, 4).' secs */';
}

?>
