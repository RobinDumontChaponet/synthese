<!--meta title="Ajout d'un Diplôme DUT" css="style/evenements.css"-->
<div id="content">
	<?php if ($_GET['id'] && $_SESSION['syntheseUser']->getId() == $_GET['id'] || $_SESSION['syntheseUser']->getTypeProfil()->getLibelle() == 'Admin') {
		if ($ancien != NULL) {
			if ($errorDiplomeEtablissement)
				echo '<p class="error">Le diplôme et l\'établissement doivent être renseignés</p>';
			if ($noResultat)
				echo '<p class="error">Un résultat pour votre diplôme doit être renseigné</p>';
			if ($noPeriode)
				echo '<p class="error">Une période correcte (AAAA - AAAA) doit être renseignée</p>';
		?>
		<h1>Selectionner un Diplôme pour <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
		<form action="diplome-selectionner/<?php echo $_GET['id']?>" method="post">
			<article>
				<dl>
					<dt><label for="diplome">Diplôme</label></dt>
					<dd class="diplome">
						<select name="diplome">
							<?php if ($diplomes != NULL) {
								foreach($diplomes as $diplome)
									echo '<option value="'.$diplome->getId().'">'.$diplome->getLibelle().' ('.$diplome->getDomaine()->getLibelle().')</option>';
							} else {
								echo '<option value="NULL">Aucun diplôme disponible pour l\'étudiant</option>';
							}?>
						</select>
						<a class="diplomes" href="diplomes" target="_blank">Voir tout les diplômes</a>
						<br /><a href="diplome-ajouter/<?php echo $ancien->getId()?>">Vous ne trouvez pas votre diplôme ? Ajoutez le !</a>
					</dd>
					<dt><label for="etablissement">Etablissement</label></dt>
					<dd class="etablissement">
						<select name="etablissement">
							<?php if ($etablissements != NULL) {
								foreach($etablissements as $etablissement)
									echo '<option value="'.$etablissement->getId().'">'.$etablissement->getNom().' ('.$etablissement->getVille().'/'.$etablissement->getPays().')</option>'; // Je sais pas comment l'afficher
							}?>
						</select>
						<a class="etablissements" href="etablissements" target="_blank">Voir tout les établissements</a>
						<br /><a href="etablissement-ajouter/<?php echo $ancien->getId()?>">Vous ne trouvez pas votre établissement ? Ajoutez le !</a>
					</dd>
					<dt><label for="resultat">Résultat</label></dt>
					<dd class="resultat"><input type="number" id="resultat" name="resultat" placeholder="Résultat de votre diplôme" /></dd>
					<dt><label for="periode">Période</label></dt>
					<dd class="periode"><input type="date" id="periode1" name="periode1" maxlength="10" placeholder="jj/mm/aaaa"/> - <input type="date" id="periode2" name="periode2" maxlength="10" placeholder="jj/mm/aaaa"/></dd>
				</dl>
			</article>
			<a class="getback" href="profil-editer/<?php echo $ancien->getId();?>">Retour au profil</a>
			<input type="submit" value="Enregistrer les modifications" />

		</form>
		<?php } else {?>
			<p class="warning">Cet étudiant n'existe pas</p>
		<?php }
	} else {?>
		<p class="warning">Vous ne pouvez pas ajouter de diplôme à cet étudiant</p>
	<?php } ?>
</div>
