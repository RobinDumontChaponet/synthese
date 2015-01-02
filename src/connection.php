<?php
$badAgents = array('Java','Jakarta', 'User-Agent', 'compatible ;', 'libwww, lwp-trivial', 'curl, PHP/', 'urllib', 'GT::WWW', 'Snoopy', 'MFC_Tear_Sample', 'HTTP::Lite', 'PHPCrawl', 'URI::Fetch', 'Zend_Http_Client', 'http client', 'PECL::HTTP');
$bot=false;
$badinput=false;
foreach($badAgents as $agent) {
    if(strpos($_SERVER['HTTP_USER_AGENT'],$agent) !== false)
        $bot=true;
}
session_start();
header("HTTP/1.1 200 OK");
if (isset($_SESSION['syntheseUser']) && $_SESSION['syntheseUser']!='')
	header ('Location: index.php');
elseif (isset($_POST['user']) && isset($_POST['pwd']) && !$bot) {
	if ($_POST['user']=='' || $_POST['pwd']=='') $badinput=true;
	else {
		include('conf.inc.php');
		include(MODELS_INC.'CompteDAO.class.php');
		include('passwordHash.inc.php');

		$compte = CompteDAO::getCompteByNdc($_POST['user']);

		if ($compte != NULL) {
			if (empty($compte) || !validate_password($_POST['pwd'] , $compte->getMdp())) {
				$badinput = true;
				sleep(1);
			} else {
				session_start();
				$_SESSION['syntheseUser'] = $compte;
				session_start();
				header ('Location: index.php');
				exit;
			}
		} else {
			$badinput = true;
		}
	}
} ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 7]>   <html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]>   <html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 8]><html class="get-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<head>
<title>connectIT! | Connexion</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE]><link rel="shortcut icon" href="style/favicon-32.ico"><![endif]-->
<link rel="icon" href="style/favicon-96.png">
<meta name="msapplication-TileColor" content="#FFF">
<meta name="msapplication-TileImage" content="style/favicon-144.png">
<link rel="apple-touch-icon" href="style/favicon-152.png">
<link href="style/reset.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style/style.combined.css">
<link href="style/connection.css" rel="stylesheet" type="text/css" />
</head><body>
<aside id="form">
  <form action="connection.php" method="post" name="connection">
  	<fieldset>
  <?php if($bot===true) echo'<p class="mapsitna">Accès interdit !</p>';
else { ?>
	  <legend>connectIT!</legend>
	  <label for="user">Identifiant</label><input title="Identifiant" id="user" name="user" type="text" value="<?php if($badinput==true){ echo $_POST['user']; } ?>" required autofocus />
	  <br />
	  <label for="pwd">Mot-de-passe</label><input title="Mot-de-passe" id="pwd" name="pwd" type="password" required />
	  <br />
	  <?php if ($badinput===true) echo'<p class="badpass">Identifiant ou mot-de-passe incorrects !</p>';?>
	  <br />
	  <input class="<?php if ($badinput!==true) echo'ok'; else echo'warning';?>" name="submit" type="submit" value="&#xe613; connexion" />
	  <br /><a href="lostpassword.php" title="Alors, comme ça, on oublie son mot-de-passe ?!">mot-de-passe oublié ?</a>
	  <?php } ?>
	</fieldset>
  </form>
</aside>
<aside id="intro">
  <p>Texte de présentation...</p>
</aside>
</body>
</html>
