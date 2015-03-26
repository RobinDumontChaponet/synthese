<?php

    include_once('conf.inc.php');
    session_start();

    include_once(MODELS_INC.'AncienDAO.class.php');
	include_once(MODELS_INC.'Ancien.class.php');

    $false = false;
	$listeFinale = array();

    $listeChoixNom = AncienDAO::search($_GET['dest'], null, null, null, null, null, null, null, $false, $false, null, null, $nbTotal);
	for ($i = 0, $l = count($listeChoixNom); $i < $l; $i++)
		addAncien($listeFinale, $listeChoixNom[$i]);
	
    $listeChoixPrenom = AncienDAO::search(null, $_GET['dest'], null, null, null, null, null, null, $false, $false, null, null, $nbTotal);
	for ($i = 0, $l = count($listeChoixPrenom); $i < $l; $i++) 
		addAncien($listeFinale, $listeChoixPrenom[$i]);

    $listeFinale = clearDuplicates($listeFinale);
	
    echo json_encode($listeFinale);
	
	function addAncien(&$listeFinale, $suggestion) {
			$ancien['id'] = $suggestion->getId();
			$ancien['nom'] = $suggestion->getNomPatronymique();
			$ancien['prenom'] = $suggestion->getPrenom();
			
			array_push($listeFinale, $ancien);
	}

    function clearDuplicates($tab) {
        $listeFinaleUnicite = array();
        foreach ($tab as $ancien) {
            if (!in_array($ancien, $listeFinaleUnicite)) {
                array_push($listeFinaleUnicite, $ancien);
            }
        }
        
        return $listeFinaleUnicite;
    }
?>
