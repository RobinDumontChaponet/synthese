<?php

include_once('class.phpmailer.php');
include_once('class.smtp.php');

function Mailer () {
	// new PHPMailer instance
	$mail = new PHPMailer;
	/*$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';*/
	// SMTP config
	$mail->isSMTP();
	$mail->Host = "mail.gandi.net";
	$mail->SMTPAuth = true;

	// Please, pas de connerie avec ça ^^ !
	$mail->Username = "connectIT@dumontchapo.net";
	// Please, pas de connerie avec ça ^^ !
	$mail->Password = "connectITmail";
	$mail->SMTPSecure = 'tls';
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 587;
	//Set who the message is to be sent from
	$mail->setFrom('robin.dumont@gmail.com', 'ConnectIT!');

	$mail->isHTML(true);

	return $mail;
}

?>