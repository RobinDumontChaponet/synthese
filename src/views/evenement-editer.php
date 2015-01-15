<!--meta title="Modification événement" css="style/evenements.css"-->
<div id="content">
<?php if (isset($event) && $event != NULL && $_SESSION['user_auth']['write']) { ?>
	<h1>Modification de l'évènement</h1>
	<form action="evenement-editer/<?php echo $event->getId()?>" method="post">
		<article>
			<dl>
				<dt><label for="date">Date</label></dt>
				<dd class="evenement"><input id="date" name="date" type="date" value="<?php echo $event->getDate()?>" autofocus/></dd>
				<dt><label for="typeEvent">Type d'évènement</label></dt>
				<dd class="type">
					<select name="typeEvent">
					<?php foreach($typesEvent as $typeEvent) {
						echo '<option'.(($typeEvent->getId() == $event->getTypeEvenement()->getId())?' selected':'').' value="'.$typeEvent->getId().'">'.$typeEvent->getLibelle().'</option>';}?>
					</select>
					<a class="types" href="typesEvent" target="_blank">Liste des types d'évènements (nouvel onglet)</a>
				</dd>
				<dt><label for="inputCommentaire">Commentaire</label></dt>
				<dd class="commentaire"><textarea id="inputCommentaire" name="commentaire" rows="2" cols="80" placeholder="Peut être vide"><?php echo $event->getCommentaire(); ?></textarea></dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
	</form>
<?php
} else {
?>
	<p class="warning">Cet évènement n'est pas modifiable car il n'existe pas</p>
<?php } ?>
</div>
