<!--meta title="<?php echo (($etablissement != NULL)?$etablissement->getNom():'Établissement non trouvé'); ?>" css="style/evenements.css"-->
<div id="content">
<?php if ($etablissement != NULL && $_SESSION['user_auth']['write']) { ?>
	<h1>Modification de l'établissement</h1>
	<form action="etablissement-editer/<?php echo $etablissement->getId()?>" method="post">
		<article>
			<h3 class="etablissement"><input id="name" name="name" type="text" placeholder="Nom de l'entreprise" value="<?php echo $etablissement->getNom(); ?>"/></h3>
			<dl>
				<dt><label for="address1">Adresse 1</label></dt>
				<dd id="adresse1"><input id="address1" name="address1" type="text" placeholder="Pas d'adresse..." value="<?php echo $etablissement->getAdresse1(); ?>"/></dd>
				<dt><label for="address2">Adresse 2</label></dt>
				<dd id="adresse2"><input id="address2" name="address2" type="text" placeholder="Pas d'adresse..." value="<?php echo $etablissement->getAdresse2(); ?>"/></dd>
				<dt><label for="postalCode">Code postal</label></dt>
				<dd id="codePostal"><input id="postalCode" name="postalCode" type="text" placeholder="Pas de code postal..." value="<?php echo $etablissement->getCodePostal(); ?>"/></dd>
				<dt><label for="city">Ville</label></dt>
				<dd id="ville"><input id="city" name="city" type="text" placeholder="Pas de ville..." value="<?php echo $etablissement->getVille(); ?>"/></dd>
				<dt><label for="country">Pays</label>
				<dd id="pays">
					<select name="country" id="country">
						<option value="<?php echo $etablissement->getPays(); ?>" selected><?php echo $etablissement->getPays(); ?></option>
						<?php
						foreach($listPays as $pays) {
							?>
							<option value="<?= $pays; ?>"><?= $pays; ?></option>
							<?php
						}
						?>
					</select>
				</dd>
				<dt><label for="fax">Fax</label></dt>
				<dd id="fax"><input id="fax" name="fax" type="text" placeholder="Pas de fax..." value="<?php echo $etablissement->getFax(); ?>"</dd>
				<dt><label for="web">Site web</label></dt>
				<dd id="web"><input id="web" name="web" type="text" placeholder="Pas de web..." value="<?php echo $etablissement->getweb(); ?>"></dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
		</form>
<?php
} else {
?>
	<p class="warning">Cette entreprise n'existe pas</p>
<?php } ?>
</div>