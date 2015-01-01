<!--meta title="Ajouter un évènement" css="style/evenements.css"-->
<div id="content">
<?php if ($_SESSION['user_auth']['write']) { ?>
	<h1>Ajouter un évènement</h1>
	<form action="evenement-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="date">Date</label></dt>
				<dd><input id="date" name="date" type="date" autofocus/></dd>
				<dt class="evenement"><label for="typeEvent">Type d'évènement</label></dt>
				<dd class="type">
					<select name="typeEvent" >
					<?php foreach($typesEvent as $typeEvent)
						echo '<option value="'.$typeEvent->getId().'">'.$typeEvent->getLibelle().'</option>';
					?>
					</select>
					<a href="typesEvent" target="_blank">Accéder aux types d'évènements</a>
				</dd>
				<dt><label for="inputCommentaire">Commentaire</label></dt>
				<dd class="commentaire"><textarea id="inputCommentaire" name="commentaire" placeholder="Peut être vide"/></textarea></dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter l'évènement" />
	</form>
<?php } ?>
</div>