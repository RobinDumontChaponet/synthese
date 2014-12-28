<!--meta title="Événements" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($user == "Ancien" || $user == "Professeur") {?>
		<section>
			<h2>Événements inscrits</h2>
			<?php if($eventsInscriPost != NULL) { // Si il y a des events post où l'ancien est inscrit
				echo '<ul>';
				foreach($eventsInscriPost as $eventInscriPost) {
					echo '<li>
				<span class="typeEvent">'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'</span>
				<span class="dateEvent">'.strftime('%A %d %B %Y', strtotime($eventInscriPost->getEvenement()->getDate())).'</span>
				<p>'.$eventInscriPost->getEvenement()->getCommentaire().'</p>
				<a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">Voir l\'event</a></li>';
				}
				echo '</ul>';
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
		</section>
		<section>
			<h2>Autres événements</h2>
			<ul>
				<?php if($eventsInscriPost != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsInscriPost as $eventInscriPost) {
						echo '
							<li><a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">
								<span class="typeEvent">'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'</span>
								<span class="dateEvent">'.strftime('%A %d %B %Y', strtotime($eventInscriPost->getEvenement()->getDate())).'</span>
								<p>'.$eventInscriPost->getEvenement()->getCommentaire().'</p>
							</a><a href="evenement">S\'inscrire</a></li>';
					}
					echo '</ul>';
				} else
					echo '<span class="sad">Aucun évènement.</span>';
				?>
			</ul>
		</section>
		<section>
			<h2>Événements passés</h2>
			<ul>
			<?php if ($eventsAnt != NULL) { // Events qui sont passés
				echo '<ul>';
				foreach($eventsAnt as $eventAnt) {
					echo '<li><a href="evenement/'.$eventAnt->getId().'">
						<span class="typeEvent">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>
						<span class="dateEvent">'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</span>
						<p>'.$eventAnt->getCommentaire().'</p></a></li>';
				}
				echo '</ul>';
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ul>
		</section>
	<?php } else if ($user == "Admin") { ?>
		<section>
			<h2>Événements à venir</h2>
			<ol>
			<?php if($eventsPost != NULL) {
				echo '<ul>';
				foreach($eventsPost as $eventPost) {
					echo '<li><span class="typeEvent">'.$eventPost->getTypeEvenement()->getLibelle().'</span>
					<span class="dateEvent">'.strftime('%A %d %B %Y', strtotime($eventPost->getDate())).'</span>
					<p>'.$eventPost->getCommentaire().'</p></li>';
				}
				echo '</ul>';
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ol>
		</section>
		<section>
			<h2>Événements passés</h2>
			<ol>
			<?php if ($eventsAnt != NULL) {
				foreach($eventsAnt as $eventAnt) {
					echo '<li><span class="typeEvent">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>
					<span class="dateEvent">'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</span>
					<p>'.$eventAnt->getCommentaire().'</p></li>';
				}
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ol>
		</section>
	<?php } ?>
</div>