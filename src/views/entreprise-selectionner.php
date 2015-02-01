<!--meta title="Ajouter une entreprise à <?php if ($ancien != NULL) {
	echo $ancien->getNom();
} else {
	echo 'Personne non trouvée';
} ?>" css="style/evenements.css"-->
<div id="content">
	<?php if ($_GET['id']) {
	if ($errorPeriode1)
		echo '<p class="error">Vous devez renseigner correctement la date de début de l\'embauche (la date de fin peut être nule)</p>';
	?>

	<h1>Sélectionner une entreprise pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
	<form action="entreprise-selectionner/<?php echo $_GET['id']?>" method="post">
		<article>
			<dl>
				<dt><label for="entreprise">Enterprise</label></dt>
				<dd class="entreprise">
					<select name="entreprise">
						<?php if ($entreprises != NULL) {
							foreach($entreprises as $entreprise)
								echo '<option value="'.$entreprise->getId().'">'.$entreprise->getNom().'</option>';
						} else {
							echo '<option value="NULL">Aucune entreprise disponible pour cette personne</option>';
						}?>
					</select>
					<a class="diplomes" href="entreprises" target="_blank">Accéder aux entreprises (nouvel onglet)</a>
				</dd>
				<dt><label for="poste">Poste</label></dt>
				<dd class="poste">
					<select name="poste">
						<?php if ($postes != NULL) {
							foreach($postes as $poste)
								echo '<option value="'.$poste->getId().'">'.$poste->getLibelle().'</option>';
						}?>
					</select>
					<a class="postes" href="postes" target="_blank">Accéder aux postes (nouvel onglet)</a>
				</dd>

				<dt><label for="promotion">Dates d'embauche</label></dt>
				<dd class="date"><input id="periode1" name="periode1" maxlength="4" type="date"/> - <input id="periode2" name="periode2" maxlength="4" type="date"/></dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter l'entreprise à l'étudiant" />
		<a href="profil/<?php echo $_GET['id']?>">Retour étudiant</a>
	</form>
	<?php } else {?>
	<p class="warning">Aucun id étudiant n'a été renseigné</p>
	<?php } ?>
</div>