<!--meta title="Événements" css="style/evenements.css"-->
<div id="content">
	<a class="params" href="evenements-preferences">Vos préférences d'évènements</a>
	<h1>Évènements</h1>
	<?php
	if ($_SESSION['user_auth']['write']) {
		echo '<a class="add" href="evenement-ajouter">Ajouter un évènement</a> - <a href="typesEvent">Accéder aux types d\'évènements</a>';
	}
	if ($libelleTypeProfil == "Ancien" || $libelleTypeProfil == "Professeur") {?>
		<section id="inscrits">
			<h2>Inscrits</h2>
				<?php if($eventsInscriPost != NULL) { // Si il y a des events post où l'ancien est inscrit
					echo '<ul>';
					foreach($eventsInscriPost as $eventInscriPost) {
						echo '<li>
							<span class="typeEvent type-'.$eventInscriPost->getEvenement()->getTypeEvenement()->getId().'">'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'</span>
							<h3 class="evenement">'.(($eventInscriPost->getEvenement()->getDate())?(strftime('%A %d %B %Y', strtotime($eventInscriPost->getEvenement()->getDate()))):'Pas de date annoncée').'</h3>
							<p class="commentaire">'.substr($eventInscriPost->getEvenement()->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventInscriPost->getEvenement()->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">Voir</a><a class="desinscrire" href="index.php?requ=evenement-desinscrire&id='.$eventInscriPost->getEvenement()->getId().'">Se désinscrire</a></li>';
					}
					echo '</ul>';
				} else
					echo '<span class="sad">Aucun évènement.</span>';
				?>
		</section>
		<section id="autres">
			<h2>Autres</h2>
			<ul>
				<?php if($eventsNotInscriPost != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsNotInscriPost as $eventNotInscriPost) {
						echo '
							<li>
								<span class="typeEvent type-'.$eventNotInscriPost->getTypeEvenement()->getId().'">'.$eventNotInscriPost->getTypeEvenement()->getLibelle().'</span>
								<h3 class="evenement">'.strftime('%A %d %B %Y', strtotime($eventNotInscriPost->getDate())).'</h3>
								<p class="commentaire">'.substr($eventNotInscriPost->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventNotInscriPost->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventNotInscriPost->getId().'">Voir</a><a class="desinscrire" href="index.php?requ=evenement-inscrire&id='.$eventNotInscriPost->getId().'">S\'inscrire</a></li>';
					}
					echo '</ul>';
				}
				if($eventsWithoutDateNotInscri != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsWithoutDateNotInscri as $eventWithoutDateNotInscri) {
						echo '
							<li>
								<span class="typeEvent type-'.$eventWithoutDateNotInscri->getTypeEvenement()->getId().'">'.$eventWithoutDateNotInscri->getTypeEvenement()->getLibelle().'</span>
								<h3 class="evenement">Pas de date annoncée</h3>
								<p class="commentaire">'.substr($eventWithoutDateNotInscri->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventWithoutDateNotInscri->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventWithoutDateNotInscri->getId().'">Voir</a><a class="desinscrire" href="index.php?requ=evenement-inscrire&id='.$eventWithoutDateNotInscri->getId().'">S\'inscrire</a></li>';
					}
					echo '</ul>';
				}
				if($eventsNotInscriPost == NULL && $eventsWithoutDateNotInscri == NULL ) {
					echo '<span class="sad">Aucun évènement.</span>';
				}
				?>
			</ul>
		</section>
		<section id="passes">
			<h2>Passés</h2>
			<ul>
			<?php if ($eventsAnt != NULL) { // Events qui sont passés
				echo '<ul>';
				foreach($eventsAnt as $eventAnt) {
					echo '<li>
						<span class="typeEvent type-'.$eventAnt->getTypeEvenement()->getId().'">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>
						<h3 class="evenement">'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</h3>
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
					echo '<li>
					<span class="typeEvent type-'.$eventPost->getTypeEvenement()->getId().'">'.$eventPost->getTypeEvenement()->getLibelle().'</span>
					<h3 class="evenement">'.strftime('%A %d %B %Y', strtotime($eventPost->getDate())).'</h3>
					<p class="commentaire">'.substr($eventPost->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventPost->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
					<a href="evenement/'.$eventPost->getId().'">Voir</a></li>';
				}
				echo '</ul>';
			}
			?>
			<?php if($eventsWithoutDate != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsWithoutDate as $eventWithoutDate) {
						echo '
							<li>
								<span class="typeEvent type-'.$eventWithoutDate->getTypeEvenement()->getId().'">'.$eventWithoutDate->getTypeEvenement()->getLibelle().'</span>
								<h3>Pas de date annoncée</h3>
								<p class="commentaire">'.substr($eventWithoutDate->getCommentaire(), 0, STR_TRONC).((mb_strlen($eventWithoutDate->getCommentaire())>STR_TRONC)?'<span class="troncat">...</span>':'').'</p>
							<a href="evenement/'.$eventWithoutDate->getId().'">Voir</a></li>';
					}
					echo '</ul>';
				}
				if($eventsWithoutDate == NULL && $eventsPost == NULL ) {
					echo '<span class="sad">Aucun évènement.</span>';
				}
				?>
		</section>
		<section id="passes">
			<h2>Passés</h2>
			<ul>
			<?php if ($eventsAnt != NULL) {
				foreach($eventsAnt as $eventAnt) {
					echo '<li>
					<span class="typeEvent type-'.$eventAnt->getTypeEvenement()->getId().'">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>
					<h3 class="evenement">'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</h3>
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