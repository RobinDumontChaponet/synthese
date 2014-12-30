<!--meta title="Événement" css="style/animations.css"-->

<div id="content">
	<?php if ($event != NULL) { ?>
		<section>
			<h2>Détails de l'événement</h2>
			<dl>
				<dt id="eventLibelle">Type d'événement</dt>
				<dd><?php echo $event->getTypeEvenement()->getLibelle();?></dd>
				<dt id="date">Date </dt>
				<dd><?php echo $event->getDate(); ?></dd>
				<dt id="comment">Commentaire</dt>
				<dd><?php echo $event->getCommentaire(); ?></dd>
			</dl>
		</section>
		<?php if ($_SESSION['user_auth']['write'])
			echo '<a href="evenement-editer/'.$_GET['id'].'">Editer l\'événement</a>';
	} else {?>
		<p class="warning">Cet événement n'existe pas</p>
	<?php }?>
</div>