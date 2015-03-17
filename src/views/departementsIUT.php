<!--meta title="Départements IUT" css="style/evenements.css"-->
<div id="content">
	<h1>Départements IUT</h1>
	<a class="add" href="departementIUT-ajouter">Ajouter un département IUT</a>
	<section>
	<?php
	if($departementsIUT != NULL) {
		echo '<ul>';
		foreach($departementsIUT as $departementIUT) {
			echo '<li>';
			if ($_SESSION['user_auth']['write']) {
			echo '<a class="edit" href="departementIUT-editer/'.$departementIUT->getId().'">Modifier</a><a class="delete" href="index.php?requ=departementIUT-supprimer&id='.$departementIUT->getId().'">Supprimer</a>';
			} ?>
			<p><?php echo $departementIUT->getNom().' (';?><?php echo $departementIUT->getSigle().')' ?></p>
			</li>
		<?php }
		echo '</ul>';
	} else { ?>
		<p class="sad">Il n'y a aucun département IUT</p>
	<?php }?>
	</section>
</div>