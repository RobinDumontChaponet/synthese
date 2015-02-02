<!--meta title="Ajouter une entreprise" css="style/evenements.css"-->
<div id="content">
	<?php
	if ($error)
		echo '<p class="error">Vous devez renseigner correctement tout les champs</p>';
	if ($errorCedex)
		echo '<p class="error">Le cedex est invalide</p>';
	if ($errorCedex)
		echo '<p class="error">Le numéro de téléphone est invalide</p>';
	?>
	<h1>Ajout d'une entreprise</h1>
	<form action="entreprise-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="name">Nom</label></dt>
				<dd class="entreprise"><input id="name" name="name" type="text"/></dd>

				<dt><label for="address1">Adresse 1</label></dt>
				<dd id="adresse1"><input id="address1" name="address1" type="text"/></dd>

				<dt><label for="address2">Adresse 2</label></dt>
				<dd id="adresse2"><input id="address2" name="address2" type="text"/></dd>

				<dt><label for="postalCode">Code postal</label></dt>
				<dd id="codePostal"><input id="postalCode" name="postalCode" type="text"/></dd>

				<dt><label for="city">Ville</label></dt>
				<dd id="ville"><input id="city" name="city" type="text"/></dd>

				<dt><label for="cedex">Cedex</label></dt>
				<dd class="cedex"><input id="cedex" name="cedex" type="text"/></dd>

				<dt><label for="country">Pays</label></dt>
				<dd id="pays">
					<select name="country" id="country">
						<?php foreach($lstPays as $pays){ ?>
						<option value="<?= $pays; ?>"><?php echo $pays; ?></option>
						<?php } ?>
					</select>
				</dd>

				<dt><label for="phoneNumber">Téléphone</label></dt>
				<dd id="telephoneFixe"><input id="phoneNumber" name="phoneNumber" type="text"/></dd>

				<dt><label for="APEcode">Code APE</label></dt>
				<dd class="codeAPE">
					<select id="APEcode" name="APEcode">
						<option value="Non renseigné">Non renseigné</option>
						<?php foreach($codesAPE as $codeAPE)
						echo '<option value="'.$codeAPE->getCode().'">'.$codeAPE->getCode().' - '.$codeAPE->getLibelle().'</option>';
						?>
					</select>
					<a href="codesAPE" class="codesAPE" target="_blank">Accéder aux codes APE</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter l'entreprise" />
	</form>
</div>
