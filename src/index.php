<?php
    session_start();
    require_once("connexion.php");
    require_once("styles.php");
    if(!isset($_SESSION['synt_user'])){
        header('Location: login');
    }else if(!isset($_GET['page'])){
        header('Location: accueil');   
    }
    function get_include_contents($filename) {
		if (is_file('pages/'.$filename)) {
			ob_start();
			include $filename;
			return ob_get_clean();
		}
		return false;
	}
	$inc = get_include_contents(preg_quote(strip_tags($_GET['page'])).'.php');
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
?>
    <html>
        <head>
            <title><?= $title; ?></title>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="style/reset.min.css">
            <link rel="stylesheet" type="text/css" href="style/general.css">
            <?php echo $link; ?>
        </head>
        
        <body>
            <?php
                if(isset($_GET['page'])){
                    if(file_exists('controls/'.$_GET['page'].'.php')){
                        require_once('controls/'.$_GET['page'].'.php');
                    }
                    if(file_exists('vues/'.$_GET['page'].'.php')){
                       echo $inc;
                    }else{
                        require_once('vues/404.php');   
                    }
                }
            ?>
        </body>
    </html>