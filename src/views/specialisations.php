<!--meta title="Spécialisations" css="style/evenements.css"-->
<div id="content">
	<h1>Spécialisations</h1>
	<a class="add" href="specialisation-ajouter">Ajouter une spécialisation</a> - <a href="types-specialisation">Accéder aux types de spécialisation</a>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
	<section>
	<?php
	if($spes != NULL) {
		echo '<ul>';
		foreach($spes as $spe) {
			echo '<li>';
			if ($_SESSION['user_auth']['write']) {
			echo '<a class="edit" href="specialisation-editer/'.$spe->getId().'">Modifier</a><a class="delete" href="index.php?requ=specialisation-supprimer&id='.$spe->getId().'">Supprimer</a>';
			} ?>
			<p><?php echo $spe->getLibelle() ?></p>
			<dt><label>Type de spécialisation</label></dt>
			<dd class="commentaire"><?php echo $spe->getTypeSpecialisation()->getLibelle()?></dd>
			</li>
		<?php }
		echo '</ul>';
	} else { ?>
		<p class="sad">Il n'y a aucune spécialisation</p>
	<?php }?>
	</section>
</div>