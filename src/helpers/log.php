<?php

include('conf.inc.php');
session_start();

if($_SESSION["syntheseUser"])
	if(isset($_POST['log']) && !empty($_POST['log']))
		@error_log($_POST['log']."\n", 3, LOGS_PATH.'client.log');

?>