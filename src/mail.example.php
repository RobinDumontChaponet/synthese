<?php

include_once('phpMailer/phpMailer.wrap.inc.php');

// On instancie phpMailer déjà configuré.
$mail = Mailer();

// Destinataire[, nom]_
$mail->addAddress('robin.dumont@gmail.com', 'Robin Dumont');

// L'objet, message en html et message en texte_
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// On envoi (ou pas)_
if (!$mail->send()) {
	echo 'Message could not be sent.';
	echo "Mailer Error: ".$mail->ErrorInfo;
} else
	echo "Message sent!";

?>