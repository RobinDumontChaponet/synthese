<!--meta title="Types d'évènement" css="style/evenements.css"-->
<div id="content">
	<h1>Types d'évènements</h1>
	<?php if ($_SESSION['user_auth']['write'])
		echo '	<a class="add" href="typeEvent-ajouter">Ajouter un type d\'évènement</a>';
	?>

	<section>
	<?php
	if($typesEvent != NULL) {
		echo '<ul>';
		foreach($typesEvent as $typeEvent) {
			echo '<li><a class="edit" href="typeEvent-editer/'.$typeEvent->getId().'">Modifier</a><a class="delete" href="index.php?requ=typeEvent-supprimer&id='.$typeEvent->getId().'">Supprimer</a>';
			echo '<p class="type">'.$typeEvent->getLibelle().'</p>';
			echo '</li>';
		}
		echo '</ul>';
	} else { ?>
		<p class="sad">Il n'y a aucun types d'évènement</p>
	<?php }?>
	</section>
</div>
