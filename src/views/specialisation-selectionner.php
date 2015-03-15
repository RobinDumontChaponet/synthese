<!--meta title="Ajout d'une spécialisation" css="style/evenements.css"-->
<div id="content">
	<?php if ($_GET['id']) {
		if (isset($errorSelectSpe) && $errorSelectSpe)
				echo '<p class="error">Veuillez selectionner une spécialisation</p>';
	?>
	<h1>Sélectionner une spécialisation pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' <span class="nom">'.$ancien->getNomPatronymique().'</span>';?></h1>
	<form action="specialisation-selectionner/<?php echo $_GET['id']?>" method="post">
		<article>
			<dl>
				<dt><label>Spécialisation</label></dt>
				<dd>
					<select name="specialisation">
						<option value=""></option>
						<?php if ($spes != NULL) {
							foreach($spes as $spe)
								echo '<option value="'.$spe->getId().'">'.$spe->getLibelle().' ('.$spe->getTypeSpecialisation()->getLibelle().')</option>';
						} else
							echo '<option>Aucune spécialisation disponible pour cette personne</option>';
						?>
					</select>
					<a href="specialisations" target="_blank">Accéder aux spécialisations (nouvel onglet)</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter la spécialisation à l'étudiant" />
		<a class="getback" href="profil/<?php echo $_GET['id']?>">Retour au profil</a>
	</form>
	<?php } else {?>
		<p class="warning">Aucun id étudiant n'a été renseigné</p>
	<?php } ?>
</div>