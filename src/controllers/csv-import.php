<?php

//if($_SESSION['trombiUser']->getAuth()->getId()==0) { // user is Admin

	include(MODELS_INC.'DepartementIUTDAO.class.php');

	$departements = DepartementIUTDAO::getAll();

	if(!empty($_POST)) {

		/*include_once(MODELS_INC.'Student.class.php');
		require_once('includes/csvParser.php');

		$csv = csv2array('csv');
		$group = getGroupById($_GET['id']);

		$order = array();
		foreach($_POST as $key => $value) {
			$order[$value]=$key;
		}

		foreach($csv as $line) {
			//$student = new Student('', $line[$order['name']], $line[$order['firstName']]);
			//$student->setStudentGroup($group);
			$student = new Student(-1, $line[$order['name']], $line[$order['firstName']]);
			createStudent($student);

			$student->setStudentGroup($group);
		}
		header ('Location: index.php?requ=group&id='.$_GET['id']);*/

	} else
		include(VIEWS_INC.'csv-import.php');
//}

?>