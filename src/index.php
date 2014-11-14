 function get_include_contents($filename) {
		if (is_file('pages/'.$filename)) {
			ob_start();
			include $filename;
			return ob_get_clean();
		}
		return false;
	}
	$inc = get_include_contents(preg_quote(strip_tags($_GET['r'])).'.php');
	$start=strpos($inc, '<!--meta') + strlen('<!--meta');
	$tag=trim(substr($inc,$start,strpos($inc, '-->')-$start));
	if($tag) {
		$link=''; $script=''; $onload='';
		$tag=preg_split('/\s+/',$tag);
		foreach($tag as $rule) {
			$param=substr($rule,0,strpos($rule,'"'));
			$arg=substr($rule,strpos($rule,'"')+1,strrpos($rule,'"')-strpos($rule,'"')-1);
			switch($param){
				case"title=": $title=$arg; break;
				case"css=": $link.='<link rel="stylesheet" type="text/css" href="'.$arg.'"/>'."\n"; break;
				case"js=":  $script.='<script type="text/javascript" src="'.$arg.'"></script>'."\n"; break;
				case"onload=":  $onload.=$arg.'();'; break;
			}
		}
		if($onload!='') $script.="\n".'<script type="text/javascript">window.onload=function(){'.$onload.'}</script>';
	}
