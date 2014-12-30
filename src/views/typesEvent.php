<!--meta title="Types d'évènement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($typesEvent != NULL) { ?>
		<h1>Types d'évènements</h1>
		<?php if ($_SESSION['user_auth']['write']) {
		echo '
		<section>
			<a href="typeEvent-ajouter">Ajouter un type d\'évènement</a>
		</section>'; }
		
		echo '<section>';
			if($typesEvent != NULL) {
				echo '<ul>';
				foreach($typesEvent as $typeEvent) {
					echo '<li>
					<p>'.$typeEvent->getLibelle().'</p>
					<a href="typeEvent-editer/'.$typeEvent->getId().'">Modifier</a><a href="typeEvent-supprimer/'.$typeEvent->getId().'">Supprimer</a></li>';
				}
				echo '</ul>';
			} 
		echo '</section>';
	} else {?>
			<p class="warning">Ce type d'évènement n'existe pas</p>
	<?php }?>
</div>