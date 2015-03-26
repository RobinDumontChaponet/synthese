<!--meta title="Types spécialisation" css="style/evenements.css"-->
<div id="content">
	<h1>Types spécialisation</h1>
	<a class="add" href="type-specialisation-ajouter">Ajouter un type de spécialisation</a>
	<script>backButton()</script>
	
	<section>
	<?php
	if($typesSpe != NULL) {
		echo '<ul>';
		foreach($typesSpe as $typeSpe) {
			echo '<li>';
			if ($_SESSION['user_auth']['write']) {
			echo '<a class="edit" href="type-specialisation-editer/'.$typeSpe->getId().'">Modifier</a><a class="delete" href="index.php?requ=type-specialisation-supprimer&id='.$typeSpe->getId().'">Supprimer</a>';
			} ?>
			<p><?php echo $typeSpe->getLibelle() ?></p>
			</li>
		<?php }
		echo '</ul>';
	} else { ?>
		<p class="sad">Il n'y a aucun types de spécialisation</p>
		<script>backButton()</script>
	<?php }?>
	</section>
</div>