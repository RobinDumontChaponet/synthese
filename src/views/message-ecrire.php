<!--meta title="Écrire un message" js="script/message.js" js="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" js="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js" css="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" -->
<div id="content">
	<h1>Envoyer un message</h1>
	<form method="POST" action="message-ecrire">
		<article>
			<dl>
			<dt><label for="destinataire">Destinataire</label></dt>
			<dd class="personne"><input type="text" id="destinataire" name="destinataire"<?=(isset($destinataire))?' value="'.$destinataire.'"':'' ?> /></dd>
			<dt><label for="objet">Objet</label></dt>
			<dd class="description"><input type="text" id="objet" name="objet"<?=(isset($objet))?' value="'.$objet.'"':'' ?> /></dd>
			<dt><label for="message">Message</label></dt>
			<dd class="message"><textarea id="message" name="message" cols="50" rows="10"><?=(isset($message))?$message:'' ?></textarea></dd>
		</article>
		<input type="submit" value="Envoyer" />
        <input type="hidden" value="" id="chosen" name="chosen" />
	</form>
</div>
<script type="text/javascript">
    init_message();
</script>
