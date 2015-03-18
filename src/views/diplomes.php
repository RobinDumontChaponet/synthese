<!--meta title="Diplômes" css="style/evenements.css"-->
<div id="content">
	<h1>Diplômes</h1>
	<a class="add" href="diplome-ajouter">Ajouter un diplôme</a>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
	<section>
	<?php
	if($diplomes != NULL) {
		echo '<ul>';
		foreach($diplomes as $diplome) {
			echo '<li>';
			if ($_SESSION['user_auth']['write']) {
			echo '<a class="edit" href="diplome-editer/'.$diplome->getId().'">Modifier</a><a class="delete" href="index.php?requ=diplome-supprimer&id='.$diplome->getId().'">Supprimer</a>';
			} ?>
			<p><a href="diplome/<?php echo $diplome->getId();?>"><?php echo $diplome->getLibelle();?></a></p>
			<dt><label>Domaine</label></dt>
			<dd class="domaine"><?php echo $diplome->getDomaine()->getLibelle();?></dd>
			<dt><label>Description</label></dt>
			<dd class="commentaire"><?php echo $diplome->getDomaine()->getDescription();?></dd>
			</li>
		<?php }
		echo '</ul>';
	} else { ?>
		<p class="sad">Il n'y a aucun diplôme</p>
	<?php }?>
	</section>
</div>