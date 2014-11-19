<?php

function connect () {
	try {
		$connection = new PDO( 'mysql:host=localhost;dbname=synthese', 'root', 'boussea24', array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $connection;
	} catch ( Exception $e ) {
		echo "Connection à MySQL impossible : ", $e->getMessage();
	}
}

?>