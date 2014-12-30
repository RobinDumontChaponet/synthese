<!--meta title="Événement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($event != NULL) { ?>
		<h1>Détails de l'événement</h1>
			<article>
				<span class="typeEvent type-<?php echo $event->getTypeEvenement()->getId();?>"><?php echo $event->getTypeEvenement()->getLibelle();?></span>
				<h3><?php echo (($event->getDate())?(strftime('%A %d %B %Y', strtotime($event->getDate()))):'Pas de date annoncée');?></h3>
				<h4>Commentaire</h4>
				<p><?php echo $event->getCommentaire();?></p>
			</article>
			<?php if ($_SESSION['user_auth']['write'])
				echo '<a href="evenement-editer/'.$_GET['id'].'">Editer l\'événement</a> <a href="index.php?requ=evenement-supprimer&id='.$_GET['id'].'">Supprimer l\'événement</a>';
	} else {?>
		<p class="warning">Cet événement n'existe pas</p>
	<?php }?>
</div>