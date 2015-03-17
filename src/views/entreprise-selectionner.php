<!--meta title="Ajouter une entreprise à <?php if ($ancien != NULL) {
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
		if ($errorPeriodes)
			echo '<p class="error">Vous devez renseigner correctement la date de fin (elle doit être supérieure à celle de départ)</p>';
		?>

		<h1>Sélectionner une entreprise pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
		<form action="entreprise-selectionner/<?php echo $_GET['id']?>" method="post">
			<article>
				<dl>
					<dt><label for="entreprise">Enterprise</label></dt>
					<dd class="entreprise">
						<select id="entreprise" name="entreprise">
							<option value=""></option>
							<?php if ($entreprises != NULL) {
								foreach($entreprises as $entreprise)
									echo '<option '.(($_POST['entreprise'] == $entreprise->getId())?'selected':'').' value="'.$entreprise->getId().'">'.$entreprise->getNom().'</option>';
							} else {
								echo '<option value="NULL">Aucune entreprise enregistrée...</option>';
							}?>
						</select>
						<a class="diplomes" href="entreprises" target="_blank">Accéder aux entreprises (nouvel onglet)</a>
						<br /><a href="entreprise-ajouter" target="_blank">Vous ne trouvez pas votre entreprise ? Ajoutez la !</a>
					</dd>
					<dt><label for="poste">Poste</label></dt>
					<dd class="poste">
						<select id="poste" name="poste">
							<option value=""></option>
							<?php if ($postes != NULL) {
								foreach($postes as $poste)
									echo '<option '.(($_POST['poste'] == $poste->getId())?'selected':'').' value="'.$poste->getId().'">'.$poste->getLibelle().'</option>';
							} else {
								echo '<option value="NULL">Aucun poste enregistré...</option>';
							}?>
						</select>
						<a class="postes" href="postes" target="_blank">Accéder aux postes (nouvel onglet)</a>
						<br /><a href="poste-ajouter" target="_blank">Vous ne trouvez pas votre poste ? Ajoutez le !</a>
					</dd>

					<dt><label for="periode1">Dates</label></dt>
					<dd class="periode"><input id="periode1" name="periode1" maxlength="10" type="date" value="<?php echo $_POST['periode1'] ?>" placeholder="jj/mm/aaaa"/> <label for="periode2">à</label> <input id="periode2" name="periode2" maxlength="10" type="date" value="<?php echo $_POST['periode2'] ?>" placeholder="jj/mm/aaaa"/></dd>
				</dl>
			</article>
			<a class="getback" href="profil/<?php echo $_GET['id']?>#entreprises">Retour au profil</a>
			<input type="submit" value="Ajouter l'entreprise à l'étudiant" />

		</form>
		<?php } else if ($_GET['id'] == NULL) {
			echo '<p class="warning">Aucun id étudiant n\'a été renseigné</p>';
		} else {
			echo '<p class="warning">Vous ne pouvez pas ajouter un travail à cette personne</p>';
		}
		{ ?>

		<?php } ?>
	</div>