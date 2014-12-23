<!--meta title="IUTbook | Profil" css="style/animations.css"-->

<section id="content">
	<?php if ($user == "Ancien") {?>
		<div>
			<h2>Événements inscrits</h2>
			<table style="border:1px solid black">
				<tr>
					<td>Type d'événement</td>
					<td>Date</td>
					<td>Commentaires</td>
					<td></td>
				</tr>
				<?php if($eventsInscriPost != NULL) {	//	Si il y a des events post où l'ancien est inscrit
					foreach($eventsInscriPost as $eventInscriPost) {
						echo '
							<tr>
								<td>'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'</td>
								<td>'.$eventInscriPost->getEvenement()->getDate().'</td>
								<td>'.$eventInscriPost->getEvenement()->getCommentaire().'</td>
								<td><a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">Voir l\'event</a></td>
							</tr>';
					}
				}?>
			</table>
		</div>
		<div>
			<h2>Autres événements</h2>
			<ol>
				<p>Type d'événement Date Commentaires</p>
				<?php if($eventsInscriPost != NULL) {	//	Si il y a des events post où l'ancien n'est pas inscrit
					foreach($eventsInscriPost as $eventInscriPost) {
						echo '
							<li><a href="evenement/'.$eventInscriPost->getEvenement()->getId().'">
								'.$eventInscriPost->getEvenement()->getTypeEvenement()->getLibelle().'
								'.$eventInscriPost->getEvenement()->getDate().'
								'.$eventInscriPost->getEvenement()->getCommentaire().'
							</a><a href="evenement">S\'inscrire</a></li>';
					}
				}?>
			</ol>
		</div>
		<div>
			<h2>Événements passés</h2>
			<ol>
				<?php if ($eventsAnt != NULL) {	//	Events qui sont passés
					foreach($eventsAnt as $eventAnt) {
						echo '<li><a href="evenement/'.$eventAnt->getId().'"><label for="typeEvent">Type d\'événement :</label><input id="typeEvent" type="text" readonly="readonly" value="'.$eventAnt->getTypeEvenement()->getLibelle().'"/>
						<label for="date">Date : </label><input id="date" type="text" readonly="readonly" value="'.$eventAnt->getDate().'"/>
						<label for="commentaire">Commentaires : </label><input id="commentaire" type="text" readonly="readonly" value="'.$eventAnt->getCommentaire().'"/></a></li>';
					}
				}?>
			</ol>
		</div>
	<?php } else if ($user == "Admin" || $user == "Professeur") {?>
		<div>
			<h2>Événements à venir</h2>
			<ol>
				<?php if($eventsPost != NULL) {
					foreach($eventsPost as $eventPost) {
						echo '<li><label for="typeEvent">Type d\'événement :</label><input id="typeEvent" type="text" readonly="readonly" value="'.$eventPost->getTypeEvenement()->getLibelle().'"/>
						<label for="date">Date : </label><input id="date" type="text" readonly="readonly" value="'.$eventPost->getDate().'"/>
						<label for="commentaire">Commentaires : </label><input id="commentaire" type="text" readonly="readonly" value="'.$eventPost->getCommentaire().'"/></li>';
					}
				}?>
			</ol>
		</div>
		<div>
			<h2>Événements passés</h2>
			<ol>
				<?php if ($eventsAnt != NULL) {
					foreach($eventsAnt as $eventAnt) {
						echo '<li><label for="typeEvent">Type d\'événement :</label><input id="typeEvent" type="text" readonly="readonly" value="'.$eventAnt->getTypeEvenement()->getLibelle().'"/>
						<label for="date">Date : </label><input id="date" type="text" readonly="readonly" value="'.$eventAnt->getDate().'"/>
						<label for="commentaire">Commentaires : </label><input id="commentaire" type="text" readonly="readonly" value="'.$eventAnt->getCommentaire().'"/></li>';
					}
				}?>
			</ol>
		</div>
	<?php } ?>
</section>