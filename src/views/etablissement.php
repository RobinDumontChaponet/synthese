<!--meta title="<?php echo (($etablissement != NULL)?$etablissement->getNom():'Établissement non trouvé'); ?>" css="style/animations.css"-->
<div id="content">
	<?php if ($etablissement != NULL) { ?>
		<ul>
			<li><label for="etablissementName">Nom de l'établissement</label><input id="etablissementName" type="text" placeholder="Nom de l'entreprise" readonly="readonly" value="<?php echo $etablissement->getNom(); ?>"/></li>
			<li><label for="address1">Adresse 1</label><input id="address1" type="text" placeholder="Adresse 1" readonly="readonly" value="<?php echo $etablissement->getAdresse1(); ?>"/></li>
			<li><label for="address2">Adresse 2</label><input id="address2" type="text" placeholder="Adresse 2" readonly="readonly" value="<?php echo $etablissement->getAdresse2(); ?>"/></li>
			<li><label for="postalCode">Code postal</label><input id="postalCode" type="text" placeholder="Code postal" readonly="readonly" value="<?php echo $etablissement->getCodePostal(); ?>"/></li>
			<li><label for="city">Ville</label><input id="city" type="text" placeholder="Ville" readonly="readonly" value="<?php echo $etablissement->getVille(); ?>"/></li>
			<li><label for="country">Pays</label><input id="country" type="text" placeholder="Pays" readonly="readonly" value="<?php echo $etablissement->getPays(); ?>"/></li>
		</ul>	
		<?php if ($_SESSION['user_auth']['write'])
			echo '<a href="etablissement-editer/'.$_GET['id'].'">Editer l\'établissement</a>';
	} else { ?>
		<p class="warning">Cette entreprise n'existe pas</p>
	<?php } ?>
</div>