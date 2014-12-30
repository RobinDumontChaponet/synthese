<!--meta title="Types d'évènement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($typesEvent != NULL) { ?>
		<h1>Types d'évènements</h1>
		<?php if ($_SESSION['user_auth']['write']) {
		echo '
		<section>
			<a href="evenement-ajouter">Ajouter un évènement</a>
		</section>'; }
		echo '<section>';
			if($typesEvent != NULL) {
				echo '<ul>';
				foreach($typesEvent as $typeEvent) {
					echo '<li><a href="typeEvent/'.$typeEvent->getId().'">
					<p>'.$typeEvent->getLibelle().'</p>
					</a></li>';
				}
				echo '</ul>';
			} 
		echo '</section>';
	} else {?>
			<p class="warning">Ce type d'évènement n'existe pas</p>
	<?php }?>
</div>