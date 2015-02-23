<!--meta title="Ajouter un établissement" css="style/evenements.css"-->
<div id="content">
	<?php if (isset($error) && $error) {
		echo '<p class="error">Vous devez renseigner tous les champs.</p>';
	} ?>
	<h1>Ajouter un établissement</h1>
	<form action="etablissement-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="name">Nom</label></dt>
				<dd><input id="name" name="name" type="text"></dd>
				<dt><label for="address1">Adresse 1</label></dt>
				<dd id="adresse1"><input id="address1" name="address1" type="text"></dd>
				<dt><label for="address2">Adresse 2</label></dt>
				<dd id="adresse2"><input id="address2" name="address2" type="text"></dd>
				<dt><label for="postalCode">Code postal</label></dt>
				<dd id="codePostal"><input id="postalCode" name="postalCode" type="text"></dd>
				<dt><label for="city">Ville</label></dt>
				<dd id="ville"><input id="city" name="city" type="text"></dd>
				<dt><label for="country">Pays</label></dt>
				<dd id="pays">
					<select name="country" id="country">
						<?php foreach($lstPays as $pays){ ?>
						<option value="<?= $pays; ?>"><?php echo $pays; ?></option>
						<?php } ?>
					</select>
				</dd>
				<dt><label for="fax">Fax</label></dt>
				<dd id="fax"><input id="fax" name="fax" type="text"></dd>
				<dt><label for="web">Site web</label></dt>
				<dd id="web"><input id="web" name="web" type="text"></dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter l'établissement" />
	</form>
</div>