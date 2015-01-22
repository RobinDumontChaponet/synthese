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
				<dd><input id="libelle" name="libelle" placeholder="Libelle du domaine" autofocus/></dd>
				<dt><label for="description">Description</label></dt>
				<dd><input id="description" name="description" placeholder="Description du domaine"/></dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter le domaine" />
	</form>
<?php } ?>
</div>