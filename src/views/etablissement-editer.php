<!--meta title="<?php echo (($etablissement != NULL)?$etablissement->getNom():'Établissement non trouvé'); ?>" css="style/animations.css"-->
<div id="content">
	<?php if ($etablissement != NULL && $_SESSION['user_auth']['write']) { ?>
			<ul>
				<li><label for="name">Nom de l'établissement</label><input id="name" name="name" type="text" placeholder="Nom de l'entreprise" value="<?php echo $etablissement->getNom(); ?>"/></li>
				<li><label for="address1">Adresse 1</label><input id="address1" name="address1" type="text" placeholder="Adresse 1" value="<?php echo $etablissement->getAdresse1(); ?>"/></li>
				<li><label for="address2">Adresse 2</label><input id="address2" name="address2" type="text" placeholder="Adresse 2" value="<?php echo $etablissement->getAdresse2(); ?>"/></li>
				<li><label for="postalCode">Code postal</label><input id="postalCode" name="postalCode" type="text" placeholder="Code postal" value="<?php echo $etablissement->getCodePostal(); ?>"/></li>
				<li><label for="city">Ville</label><input id="city" name="city" type="text" placeholder="Ville" value="<?php echo $etablissement->getVille(); ?>"/></li>
				<li><label for="country">Pays</label><input id="country" name="country" type="text" placeholder="Pays" value="<?php echo $etablissement->getPays(); ?>"/></li>
			</ul>
	<?php } else { ?>
		<p class="warning">Cette entreprise n'existe pas</p>
	<?php } ?>
</div>