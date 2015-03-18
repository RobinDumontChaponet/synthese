<!--meta title="Ajouter un domaine" css="style/evenements.css"-->
<div id="content">
<?php if ($_SESSION['user_auth']['write']) {
	if (isset($error) && $error) {
		echo '<p class="error">Vous devez renseigner tout les champs</p>';
	} ?>
	<h1>Ajouter un domaine</h1>
	<form action="domaine-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Libelle</label></dt>
				<dd class="domaine"><input type="text" id="libelle" name="libelle" placeholder="Libelle du domaine" value="<?php echo $_POST['libelle'] ?>" autofocus/></dd>
				<dt><label for="description">Description</label></dt>
				<dd class="description"><input type="text" id="description" name="description" value="<?php echo $_POST['description'] ?>" placeholder="Description du domaine"/></dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter le domaine" />
		<a class="getback "href="javascript:history.go(-1)">Retour</a>
	</form>
<?php } ?>
</div>