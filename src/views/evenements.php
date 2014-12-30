<!--meta title="Événements" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<h1>Évènements</h1>
	<?php 
	if ($_SESSION['user_auth']['write']) {
		echo '
		<section>
			<a href="evenement-ajouter">Ajouter un évènement</a>
		</section>';
	}
	if ($libelleTypeProfil == "Ancien" || $libelleTypeProfil == "Professeur") {?>
		<section>
			<h2>Inscrits</h2>
				<?php if($eventsInscriPost != NULL) { // Si il y a des events post où l'ancien est inscrit
					echo '<ul>';
					foreach($eventsInscriPost as $eventInscriPost) {
						echo '<li><a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">
							<span class="typeEvent type-'.$eventInscriPost->getEvenement()->getTypeEvenement()->getId().'">'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'</span>
							<h3>'.strftime('%A %d %B %Y', strtotime($eventInscriPost->getEvenement()->getDate())).'</h3>
							<p>'.$eventInscriPost->getEvenement()->getCommentaire().'</p>
							</a><a href="index.php?requ=evenement-desinscrire&id='.$eventInscriPost->getEvenement()->getId().'">Se désinscrire</a></li>';
					}
					echo '</ul>';
				} else
					echo '<span class="sad">Aucun évènement.</span>';
				?>
		</section>
		<section>
			<h2>Autres</h2>
			<ul>
				<?php if($eventsNotInscriPost != NULL) { // Si il y a des events post où l'ancien n'est pas inscrit
					echo '<ul>';
					foreach($eventsNotInscriPost as $eventNotInscriPost) {
						echo '
							<li><a href="evenement/'.$eventNotInscriPost->getId().'">
								<span class="typeEvent type-'.$eventNotInscriPost->getTypeEvenement()->getId().'">'.$eventNotInscriPost->getTypeEvenement()->getLibelle().'</span>
								<h3>'.strftime('%A %d %B %Y', strtotime($eventNotInscriPost->getDate())).'</h3>
								<p>'.$eventNotInscriPost->getCommentaire().'</p>
							</a><a href="index.php?requ=evenement-inscrire&id='.$eventNotInscriPost->getId().'">S\'inscrire</a></li>';
					}
					echo '</ul>';
				} else
					echo '<span class="sad">Aucun évènement.</span>';
				?>
			</ul>
		</section>
		<section>
			<h2>Passés</h2>
			<ul>
			<?php if ($eventsAnt != NULL) { // Events qui sont passés
				echo '<ul>';
				foreach($eventsAnt as $eventAnt) {
					echo '<li><a href="evenement/'.$eventAnt->getId().'">
						<span class="typeEvent type-'.$eventAnt->getTypeEvenement()->getId().'">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>
						<h3>'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</h3>
						<p>'.$eventAnt->getCommentaire().'</p></a></li>';
				}
				echo '</ul>';
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ul>
		</section>
	<?php } else if ($libelleTypeProfil == "Admin") { ?>
		<section>
			<h2>À venir</h2>
			<ol>
			<?php if($eventsPost != NULL) {
				echo '<ul>';
				foreach($eventsPost as $eventPost) {
					echo '<li><a href="evenement/'.$eventPost->getId().'">
					<span class="typeEvent type-'.$eventPost->getTypeEvenement()->getId().'">'.$eventPost->getTypeEvenement()->getLibelle().'</span>
					<h3>'.strftime('%A %d %B %Y', strtotime($eventPost->getDate())).'</h3>
					<p>'.$eventPost->getCommentaire().'</p>
					</a></li>';
				}
				echo '</ul>';
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ol>
		</section>
		<section>
			<h2>Passés</h2>
			<ol>
			<?php if ($eventsAnt != NULL) {
				foreach($eventsAnt as $eventAnt) {
					echo '<li><a href="evenement/'.$eventAnt->getId().'">
					<span class="typeEvent type-'.$eventAnt->getTypeEvenement()->getId().'">'.$eventAnt->getTypeEvenement()->getLibelle().'</span>
					<h3>'.strftime('%A %d %B %Y', strtotime($eventAnt->getDate())).'</h3>
					<p>'.$eventAnt->getCommentaire().'</p>
					</a></li>';
				}
			} else
				echo '<span class="sad">Aucun évènement.</span>';
			?>
			</ol>
		</section>
	<?php } ?>
</div>