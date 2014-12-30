<!--meta title="Modification événement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
<?php if (isset($event) && $event != NULL && $_SESSION['user_auth']['write']) { ?>
	<form action="evenement-editer/<?php echo $event->getId()?>" method="post">
		<h1>Modification de l'évènement</h1>
		<ul>
			<li>
				<label for="date">Date</label>
				<input id="date" name="date" type="date" value="<?php echo $event->getDate()?>"/>
			</li>
			<li>
				<label for="typeEvent">Type d'évènement</label>
				<select name="typeEvent" ><?php foreach($typesEvent as $typeEvent) { echo '<option'.(($typeEvent->getId() == $event->getTypeEvenement()->getId())?' selected':'').' value="'.$typeEvent->getId().'">'.$typeEvent->getLibelle().'</option>';}?></select>
				<a href="typesEvent">Accéder aux types d'évènements</a>
			</li>
			<li>
				<label for="commentaire">Commentaire</label>
				<textarea id="commentaire" name="commentaire" rows="2" cols="80" placeholder="Peut être vide"/><?php echo $event->getCommentaire(); ?></textarea>
			</li>
		</ul>
		<input type="submit" value="Enregistrer les modifications" />
	</form>
	<?php } else {?>
		<p class="warning">Cet évènement n'est pas modifiable car il n'existe pas</p>
	<?php }?>
</div>