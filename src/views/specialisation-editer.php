<!--meta title="Modifier une spécialisation" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) {
		if (isset($error) && $error) {
			echo '<p class="error">Vous devez renseigner tout les champs</p>';
		} ?>
		<h1>Modifier une spécialisation</h1>
		<?php if (isset($spe) && $spe != NULL && $_SESSION['user_auth']['write']) { ?>
		<form action="specialisation-editer/<?php echo $spe->getId(); ?>" method="post">
			<article>
				<dl>
					<dt><label for="libelle">Libelle</label></dt>
					<dd><input type="text" id="libelle" name="libelle" placeholder="Libelle de la spécialisation" value="<?php if ($_POST['libelle'] != $spe->getLibelle()) { echo $_POST['libelle']; } if (!$_POST) echo $spe->getLibelle(); ?>" autofocus/></dd>
					<dt><label for="typeSpe">Type de Spécialisation</label></dt>
					<select name="typeSpe" id="typeSpe">
						<option></option>
						<?php foreach($typeSpes as $typeSpe) {
							echo '<option '.(($typeSpe->getId() == $spe->getTypeSpecialisation()->getId())?'selected':'').' value="'.$typeSpe->getId().'">'.$typeSpe->getLibelle().'</option>';
						}?>
					</select>
					<a href="types-specialisation">Voir les types de spécialisations</a>
				</dl>
			</article>
			<input type="submit" value="Modifier la spécialisation" />
			<script>backButton()</script>
		</form>
		<?php } else { ?>
		<p class="warning">Cette spécialisation n'existe pas</p>
		<script>backButton()</script>
		<?php }
	} ?>
</div>