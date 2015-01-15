<!--meta title="Événement" css="style/evenements.css"-->
<div id="content">
<?php if ($event != NULL) { ?>
	<?php if ($_SESSION['user_auth']['write'])
		echo '<a href="evenements">Retour</a><a class="edit" href="evenement-editer/'.$_GET['id'].'">Editer l\'événement</a><a class="delete" href="index.php?requ=evenement-supprimer&id='.$_GET['id'].'">Supprimer l\'événement</a>';
	?>
	<h1>Détails de l'évènement</h1>
	<section>
		<article<?php if($_SESSION['user_auth']['write']) echo ' contextmenu="menuEvent"';?>>
			<?php if ($eventPost->getTypeEvenement != NULL) {
					echo '<span class="typeEvent type-'.$eventPost->getTypeEvenement()->getId().'">'.$eventPost->getTypeEvenement()->getLibelle().'</span>';
				} else {
					echo '<span class="typeEvent">Pas de type d\'évènement</span>';
				} ?>
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