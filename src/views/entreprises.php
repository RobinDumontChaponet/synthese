<!--meta title="Entreprises" css="style/evenements.css"-->
<div id="content">
	<h1>Entreprises</h1>
	<a class="add" href="entreprise-ajouter">Ajouter une entreprise</a>
	<section>
		<?php
		if($entreprises != NULL) {
			echo '<ul>';
			foreach($entreprises as $entreprise) {
				echo '<li>';
				if ($_SESSION['user_auth']['write']) {
					echo '<a class="edit" href="entreprise-editer/'.$entreprise->getId().'">Modifier</a><a class="delete" href="index.php?requ=entreprise-supprimer&id='.$entreprise->getId().'">Supprimer</a>';
				} ?>
				<p class="entreprise"><a href="entreprise/<?php echo $entreprise->getId();?>"><?php echo $entreprise->getNom();?></a></p>
				<dt id="ville"><label>Ville</label></dt>
				<dd class="ville"><?php echo $entreprise->getVille();?></dd>
				<dt id="pays"><label>Pays</label></dt>
				<dd class="pays"><?php echo $entreprise->getPays();?></dd>
			</li>
			<?php }
			echo '</ul>';
		} else { ?>
		<p class="sad">Il n'y a aucune entreprise enregistré.</p>
		<?php }?>
	</section>
</div>
