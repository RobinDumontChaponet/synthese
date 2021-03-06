<!--meta title="Événements" css="style/evenements.css"-->
<div id="content">
	<?php if ($libelleTypeProfil != "Admin") {?>
		<a class="params" href="evenements-preferences">Vos préférences d'évènements</a>
	<?php }?>
	<h1>Évènements</h1>
	<?php
	if ($_SESSION['user_auth']['write']) {
		echo '<div><a class="add" href="evenement-ajouter">Ajouter un évènement</a> - <a href="typesEvent">Accéder aux types d\'évènements</a></div>';
	}
	if ($libelleTypeProfil == "Ancien" || $libelleTypeProfil == "Professeur") {?>
		<section id="inscrits">
			<h2>Inscrits</h2>
				<?php if($eventsInscriPost != NULL) { // Si il y a des events post où l'ancien est inscrit
					echo '<ul>';
					foreach($eventsInscriPost as $eventInscriPost) {
						echo '<li>';
						if ($eventInscriPost->getEvenement()->getTypeEvenement() != NULL)
							echo '<span class="typeEvent type-'.$eventInscriPost->getEvenement()->getTypeEvenement()->getId().'">'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'</span>';
						else
							echo '<span class="typeEvent">Pas de type d\'évènement</span>';
						echo '<h3 class="evenement">'.$eventInscriPost->getEvenement()->getNom().'</h3><span class="date">'.(($eventInscriPost->getEvenement()->getDate())?(strftime('%A %d %B %Y', strtotime($eventInscriPost->getEvenement()->getDate()))):'Pas de date annoncée').'</span>
							<p class="commentaire">'.substr($eventInscriPost->getEvenement()->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventInscriPost->getEvenement()->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">Voir</a><a class="desinscrire" href="index.php?requ=evenement-desinscrire&id='.$eventInscriPost->getEvenement()->getId().'">Se désinscrire</a></li>';
					}
					echo '</ul>';
				} else
					echo '<span class="sad">Aucun évènement.</span>';
				?>
		</section>
		<section id="autres">
			<h2>Non inscrits</h2>
			<ul>
				<?php if($eventsNotInscriPost != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsNotInscriPost as $eventNotInscriPost) {
						echo '
							<li>';
							if ($eventNotInscriPost->getTypeEvenement() != NULL)
								echo '<span class="typeEvent type-'.$eventNotInscriPost->getTypeEvenement()->getId().'">'.$eventNotInscriPost->getTypeEvenement()->getLibelle().'</span>';
							else
								echo '<span class="typeEvent">Pas de type d\'évènement</span>';
							echo '<h3 class="evenement">'.$eventNotInscriPost->getNom().'</h3><span class="date">'.strftime('%A %d %B %Y', strtotime($eventNotInscriPost->getDate())).'</span>
								<p class="commentaire">'.substr($eventNotInscriPost->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventNotInscriPost->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventNotInscriPost->getId().'">Voir</a><a class="desinscrire" href="index.php?requ=evenement-inscrire&id='.$eventNotInscriPost->getId().'">S\'inscrire</a></li>';
					}
					echo '</ul>';
				}
				if($eventsWithoutDateNotInscri != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsWithoutDateNotInscri as $eventWithoutDateNotInscri) {
						echo '
							<li>';
							if ($eventWithoutDateNotInscri->getTypeEvenement() != NULL)
								echo '<span class="typeEvent type-'.$eventWithoutDateNotInscri->getTypeEvenement()->getId().'">'.$eventWithoutDateNotInscri->getTypeEvenement()->getLibelle().'</span>';
							else
								echo '<span class="typeEvent">Pas de type d\'évènement</span>';
							echo '<h3 class="evenement">'.$eventWithoutDateNotInscri->getNom().'</h3><span class="date">Pas de date annoncée</span>
							<p class="commentaire">'.substr($eventWithoutDateNotInscri->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventWithoutDateNotInscri->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventWithoutDateNotInscri->getId().'">Voir</a><a class="desinscrire" href="index.php?requ=evenement-inscrire&id='.$eventWithoutDateNotInscri->getId().'">S\'inscrire</a></li>';
					}
					echo '</ul>';
				}
				if($eventsNotInscriPost == NULL && $eventsWithoutDateNotInscri == NULL )
					echo '<span class="sad">Aucun évènement.</span>';
				?>
			</ul>
		</section>
		<section id="passes">
			<h2>Passés</h2>
			<ul>
			<?php if ($eventsAnt != NULL) { // Events qui sont passés
				echo '<ul>';
				foreach($eventsAnt as $eventAnt) {
					echo '<li>';
						if ($eventAnt->getTypeEvenement() != NULL)
							echo '<span class="typeEvent type-'.$eventAnt->getTypeEvenement()->getId().'">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>';
						else
							echo '<span class="typeEvent">Pas de type d\'évènement</span>';
						echo '<h3 class="evenement">'.$eventAnt->getNom().'</h3><span class="date">'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</span>
						<p class="commentaire">'.substr($eventAnt->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventAnt->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
						<a href="evenement/'.$eventAnt->getId().'">Voir</a></li>';
				}
				echo '</ul>';
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ul>
		</section>
	<?php } else if ($libelleTypeProfil == "Admin") { ?>
		<section id="a_venir">
			<h2>À venir</h2>
			<?php if($eventsPost != NULL) {
				echo '<ul>';
				foreach($eventsPost as $eventPost) {
					echo '<li>';
					if ($eventPost->getTypeEvenement() != NULL)
						echo '<span class="typeEvent type-'.$eventPost->getTypeEvenement()->getId().'">'.$eventPost->getTypeEvenement()->getLibelle().'</span>';
					else
						echo '<span class="typeEvent">Pas de type d\'évènement</span>';
					echo '<h3 class="evenement">'.$eventPost->getNom().'</h3><span class="date">'.strftime('%A %d %B %Y', strtotime($eventPost->getDate())).'</span>
					<p class="commentaire">'.substr($eventPost->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventPost->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
					<a href="evenement/'.$eventPost->getId().'">Voir</a></li>';
				}
				echo '</ul>';
			}
			?>
			<?php if($eventsWithoutDate != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsWithoutDate as $eventWithoutDate) {
						echo '<li>';
						if ($eventWithoutDate->getTypeEvenement() != NULL)
							echo '<span class="typeEvent type-'.$eventWithoutDate->getTypeEvenement()->getId().'">'.$eventWithoutDate->getTypeEvenement()->getLibelle().'</span>';
						else
							echo '<span class="typeEvent">Pas de type d\'évènement</span>';
						echo '<h3 class="evenement">'.$eventWithoutDate->getNom().'</h3><span class="date">Pas de date annoncée</span>
						<p class="commentaire">'.substr($eventWithoutDate->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventWithoutDate->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
						<a href="evenement/'.$eventWithoutDate->getId().'">Voir</a></li>';
					}
					echo '</ul>';
				}
				if($eventsWithoutDate == NULL && $eventsPost == NULL )
					echo '<span class="sad">Aucun évènement.</span>';
				?>
		</section>
		<section id="passes">
			<h2>Passés</h2>
			<ul>
			<?php if ($eventsAnt != NULL) {
				foreach($eventsAnt as $eventAnt) {
					echo '<li>';
						if ($eventAnt->getTypeEvenement() != NULL)
							echo '<span class="typeEvent type-'.$eventAnt->getTypeEvenement()->getId().'">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>';
						else
							echo '<span class="typeEvent">Pas de type d\'évènement</span>';
					echo '<h3 class="evenement">'.$eventAnt->getNom().'</h3><span class="date">'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</span>
					<p class="commentaire">'.substr($eventAnt->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventAnt->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
					<a href="evenement/'.$eventAnt->getId().'">Voir</a></li>';
				}
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ul>
		</section>
	<?php } ?>
</div>
