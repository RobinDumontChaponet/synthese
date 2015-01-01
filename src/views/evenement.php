<!--meta title="Événement" css="style/evenements.css"-->
<div id="content">
<?php if ($event != NULL) { ?>
	<?php if ($_SESSION['user_auth']['write'])
		echo '<a class="edit" href="evenement-editer/'.$_GET['id'].'">Editer l\'événement</a><a class="delete" href="index.php?requ=evenement-supprimer&id='.$_GET['id'].'">Supprimer l\'événement</a>';
	?>
	<h1>Détails de l'évènement</h1>
	<section>
		<article contextmenu="menuEvent">
			<span class="typeEvent type-<?php echo $event->getTypeEvenement()->getId();?>"><?php echo $event->getTypeEvenement()->getLibelle();?></span>
			<h3 class="evenement"><?php echo (($event->getDate())?(strftime('%A %d %B %Y', strtotime($event->getDate()))):'Pas de date annoncée');?></h3>
			<h4>Commentaire</h4>
			<p class="commentaire"><?php echo $event->getCommentaire();?></p>
		</article>
	</section>
	<section id="participants">
		<h2>Participants</h2>
		<ul class="magnets">
			<?php foreach ($participants as $participant) {
				echo '<li><a href="profil/'.$participant->getAncien()->getId().'">'.$participant->getAncien()->getPrenom().' <span class="nomPatronymique">'.$participant->getAncien()->getNomPatronymique().'</span></a></li>';
			} ?>
		</ul>
	</section>
<?php
} else {?>
	<p class="warning">Cet évènement n'existe pas</p>
<?php }?>
</div>