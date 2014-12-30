<?php

include('conf.inc.php');

session_start();

if($_SESSION["syntheseUser"]) {

	/*  Absolument ajouter test de droit */

	include('urls.transit.inc.php');
	include('images.transit.inc.php');

	$possibleExtensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

	$possibleDestinations = array('profil', 'trombi');

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

		$tmpImage = imagecreatefromstring($fileContent);

		$image = scaledImageRessource2Image($tmpImage, THUMB_UPLOAD_MAX_WIDTH, THUMB_UPLOAD_MAX_HEIGHT, IMAGE_EXT, JPEG_QUALITY);
		if($image) {
			echo json_encode(array(
				'image' => $image;
			));
		} else
			echo 'could not save image';

	} else
		die('unnacepted extension');

}

?>