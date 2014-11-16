<?php session_start();
if (!isset($_SESSION['syntheseUser']) || $_SESSION['syntheseUser']=='') {
	header('Location: connection.php');
	exit();
}

function get_include_contents($filename) {
	if (is_file($filename)) {
		ob_start();
		include (realpath($filename));
		return ob_get_clean();
	}
	return false;
}

set_include_path(dirname(__FILE__).'/includes');

if(!empty($_GET['requ']))
	if(is_file('controllers/'.$_GET['requ'].'.php'))
		$inc = get_include_contents('controllers/'.$_GET['requ'].'.php');
	else {
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		header("Status: 404 Not Found");
		$_SERVER['REDIRECT_STATUS'] = 404;
		$inc = get_include_contents('controllers/404.php');
	}
else
	$inc = get_include_contents('controllers/index.php');

include('transit.inc.php');

preg_match('/<\!--meta\s*(.*)-->/i', $inc, $matches);
if($matches[1]) {
	$link=''; $script=''; $onload='';
	preg_match_all("/(\\S+)=[\"']?((?:.(?![\"']?\\s+(?:\\S+)=|[\"']))+.)[\"']?/", $matches[1], $tag);
	$tag=rearrange($tag);
	foreach($tag as $rule) {
		switch($rule[1]){
			case 'title' : $title=$rule[2]; break;
			case 'css'   : $link.='<link rel="stylesheet" type="text/css" href="'.$rule[2].'"/>'."\n"; break;
			case 'js'    : $script.='<script type="text/javascript" src="'.$rule[2].'"></script>'."\n"; break;
			case 'onload': $onload.=$rule[2].'();'; break;
		}
	}
	if($onload!='') $script.="\n".'<script type="text/javascript">window.onload=function(){'.$onload.'}</script>';
}
?>
<html>
  <head>
    <title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/reset.min.css">
	<link rel="stylesheet" type="text/css" href="style/general.css">
	<?php echo $link; ?>
	<script type="text/javascript" src="script/polyShims.js"></script>
	<script type="text/javascript" src="script/transit.js"></script>
	<?php echo $script; ?>
  </head>
  <body>
  	<?php echo $inc; ?>
  </body>
</html>