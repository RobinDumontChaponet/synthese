<?php
include('conf.inc.php');

session_start();

if($_SESSION["syntheseUser"]) {

	include('urls.transit.inc.php');

	// Définitions des droits
	include_once(MODELS_INC."DisposeDeDAO.class.php");
	$user_auth = DisposeDeDAO::getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), PageDAO::getByLibelle('csv-import'))->getDroit();

	if($user_auth['write']) {

		$possibleDestinations = array('data/csv');

		$possibleExtensions = array('csv');

		$info=pathinfo($_FILES['upload']['name']);
		if($_REQUEST['basename']!='')
			$info['basename']=post_slug($_REQUEST['basename']);
		else
			$info['basename']=post_slug($info['basename']);

		$fileType = $_FILES['upload']['type'];
		$destination = $_REQUEST['destination'];

		if( !in_array($destination, $possibleDestinations))
			die('bad path ! ;-)');

		if ( in_array(strtolower($info['extension']), $possibleExtensions) ) {

			$fileContent = file_get_contents($_FILES['upload']['tmp_name']);
			if(file_put_contents('../'.$destination.$sub.'/'.$info['basename'], $fileContent)!==false) {
				echo json_encode(array(
					'name' => $info['basename'],
					'type' => $fileType,
					'path' => $destination.$sub,
					'ext' => $info['extension']
				));
			}

		} else
			die('unnacepted extension');

	}
}
?>
