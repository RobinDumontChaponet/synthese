<?php

session_start();

if(isset($_GET['set']))
	$_SESSION['help']=($_GET['set']=='true')?true:false;

?>
