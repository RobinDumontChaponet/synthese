<!--meta title="<?php echo (($etablissement != NULL)?$etablissement->getNom():'Établissement non trouvé'); ?>" css="style/animations.css"-->
<div id="content">
	<?php if ($etablissement != NULL) {
			if ($user == "Ancien") { /* Ne peut pas modifier */ ?>
			<ol>
				<li><label for="etablissementName">Nom de l'établissement :</label><input id="etablissementName" type="text" placeholder="Nom de l'entreprise" readonly="readonly" value="<?php echo $etablissement->getNom(); ?>"/></li>
				<li><label for="address1">Adresse 1 :</label><input id="address1" type="text" placeholder="Adresse 1" readonly="readonly" value="<?php echo $etablissement->getAdresse1(); ?>"/></li>
				<li><label for="address2">Adresse 2 :</label><input id="address2" type="text" placeholder="Adresse 2" readonly="readonly" value="<?php echo $etablissement->getAdresse2(); ?>"/></li>
				<li><label for="postalCode">Code postal :</label><input id="postalCode" type="text" placeholder="Code postal" readonly="readonly" value="<?php echo $etablissement->getCodePostal(); ?>"/></li>
				<li><label for="city">Ville :</label><input id="city" type="text" placeholder="Ville" readonly="readonly" value="<?php echo $etablissement->getVille(); ?>"/></li>
				<li><label for="country">Pays :</label><input id="country" type="text" placeholder="Pays" readonly="readonly" value="<?php echo $etablissement->getPays(); ?>"/></li>
			</ol>
		<?php } else if ($user == "Admin" || $user == "Professeur") { /*Peut modifier*/ ?>
			<ol>
				<li><label for="etablissementName">Nom de l'établissement :</label><input id="etablissementName" type="text" placeholder="Nom de l'entreprise" value="<?php echo $etablissement->getNom(); ?>"/></li>
				<li><label for="address1">Adresse 1 :</label><input id="address1" type="text" placeholder="Adresse 1" value="<?php echo $etablissement->getAdresse1(); ?>"/></li>
				<li><label for="address2">Adresse 2 :</label><input id="address2" type="text" placeholder="Adresse 2" value="<?php echo $etablissement->getAdresse2(); ?>"/></li>
				<li><label for="postalCode">Code postal :</label><input id="postalCode" type="text" placeholder="Code postal" value="<?php echo $etablissement->getCodePostal(); ?>"/></li>
				<li><label for="city">Ville :</label><input id="city" type="text" placeholder="Ville" value="<?php echo $etablissement->getVille(); ?>"/></li>
				<li><label for="country">Pays :</label><input id="country" type="text" placeholder="Pays" value="<?php echo $etablissement->getPays(); ?>"/></li>
			</ol>
		<?php }
	} else { ?>
		<p class="warning">Cette entreprise n'existe pas</p>
	<?php } ?>
</div>