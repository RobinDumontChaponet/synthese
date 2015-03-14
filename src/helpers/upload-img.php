<?php

include('conf.inc.php');

session_start();

if($_SESSION["syntheseUser"]) {

	/*  Absolument ajouter test de droit */

	include_once('strings.transit.inc.php');
	include('images.transit.inc.php');

	$possibleExtensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

	$possibleDestinations = array('profil', 'trombi');

	$info=pathinfo($_FILES['upload']['name']);
	if($_REQUEST['basename']!='')
		$info['basename']=post_slug($_REQUEST['basename']);
	else
		$info['basename']=post_slug($info['basename']);

	$fileType = $_FILES['upload']['type'];

	preg_match_all("/([^\/]+)/", $_REQUEST['destination'], $matches);
	$destination = $matches[0][0];
	$sub = $matches[0][count($matches[0])-1];

	if( !in_array($destination, $possibleDestinations))
		die('bad path ! ;-)');

	include_once(MODELS_INC.'AncienDAO.class.php');

	if ( in_array(strtolower($info['extension']), $possibleExtensions) ) {

		$fileContent = file_get_contents($_FILES['upload']['tmp_name']);

		$tmpImage = imagecreatefromstring($fileContent);

		$image = scaledImageRessource2Image($tmpImage, THUMB_UPLOAD_MAX_WIDTH, THUMB_UPLOAD_MAX_HEIGHT, IMAGE_EXT, JPEG_QUALITY);

		if($image) {
			$ancien = AncienDAO::getById($sub);
			if($destination=='profil')
				$ancien->setImageProfil($image);
			elseif($destination=='trombi')
				$ancien->setImageTrombi($image);
			AncienDAO::update($ancien);

			echo json_encode(
				array(
					'image' => base64_encode($image),
					'destination' => $destination,
					'id' => $sub
				)
			);
		} else
			echo 'could not save image';

	} else
		die('unaccepted extension');

}

?>