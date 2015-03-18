<!--meta title="Ajouter un département IUT" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) {
		if (isset($error) && $error) {
			echo '<p class="error">Vous devez renseigner tous les champs</p>';
		} ?>
		<h1>Ajouter un département IUT</h1>
		<form action="departementIUT-ajouter" method="post">
			<article>
				<dl>
					<dt><label for="nom">Nom du département</label></dt>
					<dd><input type="text" id="nom" name="nom" placeholder="Nom du département IUT" value="<?php echo $_POST['nom'] ?>" autofocus/></dd>
					<dt><label for="sigle">Sigle</label></dt>
					<dd><input type="text" id="sigle" name="sigle" placeholder="Sigle du département" value="<?php echo $_POST['sigle'] ?>" autofocus/></dd>
				</dl>
			</article>
			<input type="submit" value="Ajouter" />
			<a class="getback "href="javascript:history.go(-1)">Retour</a>
		</form>
		<?php } ?>
	</div>