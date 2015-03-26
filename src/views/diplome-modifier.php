<!--meta title="Modification d'un diplôme" css="style/evenements.css"-->
<div id="content">
	<?php if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idDiplomePost'] != NULL && $_GET['idEtablissement'] != NULL) {
		if ($errorDate)
			echo '<p class="error">La date de début doit être renseignée</p>';
		if ($beSerious)
			echo '<p class="error">Soyez sérieux ... c\'est impossible d\'avoir commencé ce job le '.strftime('%A %d %B %Y', strtotime($_POST['periode1'])).'</p>';
		if ($errorPeriode2)
			echo '<p class="error">Vous devez renseigner correctement la date de fin (elle doit être supérieure à celle de départ)</p>';
		?>
		<h1>Modification d'un Diplôme pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
		<form action="" method="post">
			<article>
				<dl>
					<dt><label for="diplome">Diplôme</label></dt>
					<dd class="diplome">
						<select name="diplome">
							<option value="<?php echo $diplomeAncien->getId(); ?>"><?php echo $diplomeAncien->getLibelle();?></option>
							<?php if ($diplomes != NULL) {
								foreach($diplomes as $diplome) {?>
									<option value="<?php echo $diplome->getId();?>"><?php echo $diplome->getLibelle();?></option>
							<?php } 
							} else {
								echo '<option value="NULL">Aucun diplôme disponible pour cette personne</option>';
							}?>
						</select>
						<a class="diplomes" href="diplomes" target="_blank">Accéder aux diplômes (nouvel onglet)</a>
					</dd>
					<dt><label for="etablissement">Etablissement</label></dt>
					<dd class="etablissement">
						<select name="etablissement">
							<option value="<?php echo $etablissementAncien->getId(); ?>"><?php echo $etablissementAncien->getNom();?></option>
							<?php if ($etablissements != NULL) {
								foreach($etablissements as $etablissement)
									echo '<option value="'.$etablissement->getId().'">'.$etablissement->getNom().' ('.$etablissement->getVille().'/'.$etablissement->getPays().')</option>'; // Je sais pas comment l'afficher
							}?>
						</select>
						<a class="etablissements" href="etablissements" target="_blank">Voir tout les établissements</a>
						<br /><a href="etablissement-ajouter/<?php echo $ancien->getId()?>">Vous ne trouvez pas votre établissement ? Ajoutez le !</a>
					</dd>
				</dl>
				<dt><label for="resultat">Résultat</label></dt>
				<dd class="resultat"><input type="text" id="resultat" name="resultat" placeholder="Résultat de votre diplôme" value="<?php echo $possede->getResultat(); ?>"/></dd>
				<dt><label for="periode">Période</label></dt>
				<dd class="periode"><input type="date" id="periode1" name="periode1" maxlength="10" placeholder="jj/mm/aaaa" value="<?php echo $possede->getDateDebut(); ?>"/> - <input type="date" id="periode2" name="periode2" maxlength="10" placeholder="jj/mm/aaaa" value="<?php echo $possede->getDateFin(); ?>"/></dd>
			</article>
			<a class="getback" href="profil/<?php echo $_GET['idAncien']?>">Retour à l'étudiant</a>
			<input type="submit" value="Modifier le diplôme DUT de l'étudiant" />

		</form>
		<?php } else {?>
		<p class="warning">Un id a mal été renseigné</p>
		<?php } ?>
	</div>