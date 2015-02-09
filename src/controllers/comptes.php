<?php
if (isset($_POST)) {
	/*
if (isset($_POST['mod'])) {
		// Test
		$cpt=CompteDAO::getById($_POST['id']);
		if ($cpt!=null) {
			if (trim($_POST['mdp'])!="") {
				require_once('passwordHash.inc.php');
				$cpt->setMdp(create_hash($_POST['mdp']));
				$Name = "ConnectIT"; //senders name
				$email = "no-reply@connectIt.fr"; //senders e-mail adress
				$recipient = $cpt->getPersonne()->getMail(); //recipient
				$mail_body = "Bonjour, voici votre nouveau mot de passe sur notre site ConnectID : mot de passe : ".$_POST['mdp']; //mail body
				$subject = "Votre nouveau mot de passe sur notre site connectIt"; //subject
				$header = "de: ". $Name . " <" . $email . ">\r\n"; //optional headerfields
				mail($recipient, $subject, $mail_body, $header); //mail command :
			}
			$typeProf=TypeProfilDAO::getById($_POST['profil']);
			$cpt->setTypeProfil($typeProf);
			CompteDAO::update($cpt);
		}
	} else
*/if (isset($_POST['add'])) {
		if (trim($_POST['nom'])!="" && trim($_POST['prenom']) && trim($_POST['mail'])) {
			require_once('passwordHash.inc.php');
			$pers=new Personne(0, trim($_POST['nom']), trim($_POST['nom']), trim($_POST['prenom']), trim($_POST['mail']));
			PersonneDAO::create($pers);
			$login=substr($pers->getNom(), 0, 4).$pers->getId().substr($pers->getPrenom(), 0, 4);
			$typeProf=TypeProfilDAO::getById($_POST['profil']);
			$mdp=randomPassword();
			$compte=new Compte(0, $typeProf, $pers, $login, create_hash($mdp));
			$id=CompteDAO::create($compte);
			$Name = "ConnectIT!"; //senders name
			$email = "no-reply@connectIt.fr"; //senders e-mail adress
			$recipient = trim($_POST['mail']); //recipient
			$mail_body = "Bonjour, voici vos identifiants sur notre site ConnectIT! : login : ".$login." mot de passe : ".$mdp; //mail body
			$subject = "Votre mot de passe sur notre site connectIT!"; //subject
			$header = "de: ". $Name . " <" . $email . ">\r\n"; //optional headerfields
			mail($recipient, $subject, $mail_body, $header); //mail command :)
		}
	} elseif (isset($_POST['suppr'])) {
		$compte=CompteDAO::getById($_POST['id']);
		CompteDAO::delete($compte);
	}
}

$lst=array();
$lstTypeProfil=TypeProfilDAO::getAll();
foreach ($lstTypeProfil as $type) {
    $nb=0;
	$lst[$type->getId()]=CompteDAO::getByTypeProfil($type->getId(),0,null,$nb);
}
require_once(VIEWS_INC.'comptes.php');
?>
