<!--meta title="Ajouter un type de spécialisation" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) {
		if (isset($error) && $error) {
			echo '<p class="error">Vous devez renseigner tout les champs</p>';
		} ?>
		<h1>Ajouter un type de spécialisation</h1>
		<form action="type-specialisation-ajouter" method="post">
			<article>
				<dl>
					<dt><label for="libelle">Libelle</label></dt>
					<dd><input type="text" id="libelle" name="libelle" placeholder="Libelle du type de spécialisation" value="<?php echo $_POST['libelle'] ?>" autofocus/></dd>
				</dl>
			</article>
			<input type="submit" value="Ajouter le type de spécialisation" />
			<script>backButton()</script>
		</form>
		<?php } ?>
	</div>