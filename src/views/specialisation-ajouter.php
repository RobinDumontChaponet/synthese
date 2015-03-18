<!--meta title="Ajouter une spécialisation" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) {
		if (isset($error) && $error) {
			echo '<p class="error">Vous devez renseigner tout les champs</p>';
		} ?>
		<h1>Ajouter une spécialisation</h1>
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
					<a href="types-specialisation">Voir les types de spécialisations</a>
				</dl>
			</article>
			<input type="submit" value="Ajouter la spécialisation" />
			<a class="getback "href="javascript:history.go(-1)">Retour</a>
		</form>
		<?php } ?>
	</div>