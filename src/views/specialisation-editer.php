<!--meta title="Modifier une spécialisation" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) {
		if (isset($error) && $error) {
			echo '<p class="error">Vous devez renseigner tout les champs</p>';
		} ?>
		<h1>Modifier une spécialisation</h1>
		<?php if (isset($spe) && $spe != NULL && $_SESSION['user_auth']['write']) { ?>
		<form action="specialisation-ajouter" method="post">
			<article>
				<dl>
					<dt><label for="libelle">Libelle</label></dt>
					<dd><input type="text" id="libelle" name="libelle" placeholder="Libelle de la spécialisation" value="<?php echo $_POST['libelle'] ?>" autofocus/></dd>
					<dt><label for="typeSpe">Type de Spécialisation</label></dt>
					<select name="typeSpe" id="typeSpe">
						<option></option>
						<?php foreach($typeSpes as $typeSpe)
							echo '<option '.(($_POST['typeSpe'] == $typeSpe->getId())?'selected':'').' value="'.$typeSpe->getId().'">'.$typeSpe->getLibelle().'</option>';
						?>
					</select>
					<a href="types-specialisation" target="_blank">Voir les types de spécialisations (nouvel onglet)</a>
				</dl>
			</article>
			<input type="submit" value="Modifier la spécialisation" />
		</form>
		<?php } else {?>
			<p class="warning">Ce diplôme n'existe pas</p>
		<?php }?>
	</div>