<!--meta title="Message de <?= $expediteur ?> : <?= $objet ?>" css="style/message.css"-->
<div id="content">
	<h1>Message</h1>
	<section id="message">
		<article>
			<p class="date">Envoyé le <?php echo $date;?></p>
			<dl>
				<dt>Expéditeur</dt>
				<dd class="personne"><?php echo $expediteur;?></dd>
				<dt>Objet</dt>
				<dd class="description"><?php echo $objet;?></dd>
			</dl>
			<p class="message"><?php echo $corps;?></p>
		</article>
	</section>
	<section id="actions">
		<form action="message-ecrire" method="POST">
			<input type="submit" value="Répondre" />
			<input type="hidden" name="dest_rep" id="dest_rep" value=<?php echo $message->getExpediteur()->getId(); ?> />
		</form>
	</section>
</div>
