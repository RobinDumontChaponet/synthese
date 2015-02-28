<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 7]>   <html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]>   <html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 8]><html class="get-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<head>
<title>connectIT! | Générique</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE]><link rel="shortcut icon" href="style/favicon-32.ico"><![endif]-->
<link rel="icon" href="style/favicon-96.png">
<meta name="msapplication-TileColor" content="#FFF">
<meta name="msapplication-TileImage" content="style/favicon-144.png">
<link rel="apple-touch-icon" href="style/favicon-152.png">
<link href="style/reset.min.css" rel="stylesheet" type="text/css" />
<link href="style/base.part.css" rel="stylesheet" type="text/css" />
<link href="style/animations.css" rel="stylesheet" type="text/css" />
<link href="style/humans.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script/utils.transit.js"></script>
</head><body>
<div id="content">
	<h1>ConnectIT!</h1>
	<dl>
		<dt>conception & développement</dt>
		<dd><a target="_blank" href="http://robin.dumontchapo.net/">Robin Dumont-Chaponet</a></dd>
		<dt>conception & développement</dt>
		<dd>Youssef Fadili</dd>
		<dt>conception & développement</dt>
		<dd><a target="_blank" href="http://victorjozwicki.olympe.in/">Victor Jozwicki</a></dd>
		<dt>conception & développement</dt>
		<dd>Mathieu Pister</dd>
		<dt>en</dt>
		<dd>2ème année de DUT informatique à Metz, promotion 2013-2015</dd>
		<dt>Réalisé</dl>
		<dd>dans le cadre du projet de synthèse 2014-2015</dd>
	</dl>
</div>
<script>
var content=document.getElementById('content');
dds=document.getElementsByTagName('dd');
for(var i=0, l=dds.length; i<l; i++) {
	dds[i].addEventListener('mouseover', function(){setAnimationState (content, 'paused')}, false);
	dds[i].addEventListener('mouseout', function(){setAnimationState (content, 'running')}, false);
}
</script>
</body>
</html>