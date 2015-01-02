<!--meta title="Ajout d'un Diplôme DUT" css="style/evenements.css"-->
<div id="content">
	<?php if ($_GET['id'] && $_SESSION[syntheseUser]->getId() == $_GET['id'] || $_SESSION[syntheseUser]->getTypeProfil()->getLibelle() == 'Admin') {
		if ($ancien != NULL) {?>
		<h1>Selectionner un Diplôme pour <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
		<form action="diplome-selectionner/<?php echo $_GET['id']?>" method="post">
			<article>
				<dl>
					<dt><label for="diplome">Diplôme</label></dt>
					<dd>
						<select name="diplome">
							<?php if ($diplomes != NULL) {
								foreach($diplomes as $diplome)
									echo '<option value="'.$diplome->getId().'">'.$diplome->getLibelle().' ('.$diplome->getDomaine()->getLibelle().')</option>';
							}?>
						</select>
						<a href="diplomes" target="_blank">Voir tout les diplômes</a><p>Vous ne trouvez pas votre diplôme?</p><a href="diplome-ajouter/<?php echo $ancien->getId()?>">Ajoutez le !</a>
					</dd>
					<dt><label for="etablissement">Etablissement</label></dt>
					<dd>
						<select name="etablissement">
							<?php if ($etablissements != NULL) {
								foreach($etablissements as $etablissement)
									echo '<option value="'.$etablissement->getId().'">'.$etablissement->getNom().' ('.$etablissement->getVille().'/'.$etablissement->getPays().')</option>'; // Je sais pas comment l'afficher
							}?>
						</select>
						<a href="etablissements" target="_blank">Voir tout les établissements</a><p>Vous ne trouvez pas votre établissement?</p><a href="etablissement-ajouter/<?php echo $ancien->getId()?>">Ajoutez le !</a>
					</dd>
					<dt><label for="resultat">Résultat</label></dt>
					<dd><input id="resultat" name="resultat" placeholder="Résultat de votre diplôme" /></dd>
					<dt><label for="periode">Période</label></dt>
					<dd><input id="periode1" name="periode1" maxlength="4" placeholder="AAAA"/> - <input id="periode2" name="periode2" maxlength="4" placeholder="AAAA"/></dd>
				</dl>
			</article>
			<input type="submit" value="Enregistrer les modifications" />
		</form>
		<?php } else {?>
			<p class="warning">Cet étudiant n'existe pas</p>
		<?php }
	} else {?>
		<p class="warning">Vous ne pouvez pas ajouter de diplôme à cet étudiant</p>
	<?php } ?>
</div>