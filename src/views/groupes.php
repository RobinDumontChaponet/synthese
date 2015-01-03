<!--meta title="Liste des groupes" -->
<div id="content">
	<h1>Groupes</h1>
	<section>
	<?php
	if($groupes != NULL) {
		echo '<ul class="magnets">';
		foreach($groupes as $groupe)
			echo '<li><a href="groupe/'.$groupe->getId().'" title="Voir le groupe">'.$groupe->getNom().'</a></li>';
		echo '</ul>';
	} else
		echo '<p class="sad">Il n\'y a aucun groupe à afficher</p>';
	?>
	</section>
</div>