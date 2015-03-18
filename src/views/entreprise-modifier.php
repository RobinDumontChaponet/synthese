<!--meta title="Modifier une entreprise à <?php if ($ancien != NULL) {
	echo $ancien->getNom();
} else {
	echo 'Personne non trouvée';
} ?>" css="style/evenements.css"-->
<div id="content">
	<?php if ($_GET['id'] && $_SESSION['syntheseUser']->getId() == $_GET['id'] || $_SESSION['syntheseUser']->getTypeProfil()->getLibelle() == 'Admin') {
		if ($errorPeriode1)
			echo '<p class="error">Vous devez renseigner correctement la date de début de l\'embauche (la date de fin peut être nule)</p>';
		if ($errorPoste)
			echo '<p class="error">Vous devez renseigner un poste</p>';
		if ($errorEntreprise)
			echo '<p class="error">Vous devez renseigner une entreprise</p>';
		if ($errorPeriode2)
			echo '<p class="error">Vous devez renseigner correctement la date de fin (elle doit être supérieure à celle de départ)</p>';
		if ($beSerious)
				echo '<p class="error">Soyez sérieux ... c\'est impossible d\'avoir commencé ce job le '.strftime('%A %d %B %Y', strtotime($_POST['periode1'])).'</p>';
		?>

		<h1>Modification d'un travail en entreprise pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
		<form action="entreprise-modifier/<?php echo $_GET['idAncien']?>&<?php echo $_GET['idEntreprise']?>&<?php echo $_GET['periode1']?>&<?php echo $_GET['periode2']?>&<?php echo $_GET['idPoste'] ?>" method="post">
			<article>
				<dl>
					<dt><label for="entreprise">Enterprise</label></dt>
					<dd class="entreprise">
						<select id="entreprise" name="entreprise">
							<option value=""></option>
							<?php if ($entreprises != NULL) {
								foreach($entreprises as $entreprise) {?>
									<option <?php if (empty($_POST) && $entreprise->getId() == $exEntreprise->getId()) { echo 'selected';} else if ($_POST['entreprise'] == $entreprise->getId()) {echo 'selected';}?> value="<?php echo $entreprise->getId()?>"><?php echo $entreprise->getNom()?></option>
							<?php }
							} else {
								echo '<option value="NULL">Aucune entreprise enregistrée...</option>';
							}?>
						</select>
						<a class="diplomes" href="entreprises">Accéder aux entreprises</a>
						<br /><a href="entreprise-ajouter">Vous ne trouvez pas votre entreprise ? Ajoutez la !</a>
					</dd>
					<dt><label for="poste">Poste</label></dt>
					<dd class="poste">
						<select id="poste" name="poste">
							<option value=""></option>
							<?php if ($postes != NULL) {
								foreach($postes as $poste) { ?>
									<option <?php if(empty($_POST) && $poste->getId() == $exPoste->getId()) { echo 'selected';} else if ($_POST['poste'] == $poste->getId()) {echo 'selected';} ?> value="<?php echo $poste->getId()?>"><?php echo $poste->getLibelle();?></option>
							<?php }
							} else {
								echo '<option value="NULL">Aucun poste enregistré...</option>';
							}?>
						</select>
						<a class="postes" href="postes">Accéder aux postes</a>
						<br /><a href="poste-ajouter">Vous ne trouvez pas votre poste ? Ajoutez le !</a>
					</dd>

					<dt><label for="periode1">Dates</label></dt>
					<dd class="periode"><input id="periode1" name="periode1" maxlength="10" type="date" value="<?php if (!empty($_POST['periode1'])) { echo $_POST['periode1'];} else {echo $_GET['periode1'];}?>" placeholder="jj/mm/aaaa"/> <label for="periode2">à</label> <input id="periode2" name="periode2" maxlength="10" type="date" value="<?php if (!empty($_POST['periode2'])) { echo $_POST['periode2'];} else {echo $_GET['periode2'];}?>" placeholder="jj/mm/aaaa"/></dd>
				</dl>
			</article>
			<a class="getback" href="profil-editer/<?php echo $_GET['idAncien']?>#entreprises">Retour au profil</a>
			<input type="submit" value="Ajouter l'entreprise" />

		</form>
		<?php } else if ($_GET['id'] == NULL) {
			echo '<p class="warning">Aucun id étudiant n\'a été renseigné</p>';
		} else {
			echo '<p class="warning">Vous ne pouvez pas ajouter un travail à cette personne</p>';
		}
		{ ?>

		<?php } ?>
	</div>