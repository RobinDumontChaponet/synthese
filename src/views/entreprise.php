<!--meta title="<?php echo (($entreprise != NULL)?$entreprise->getNom():'Entreprise non trouvé'); ?>" css="style/animations.css"-->
<div id="content">
	<?php if ($entreprise != NULL) { ?>
		<dl>
			<dt id="companyName">Nom de l'entreprise</dt>
			<dd><?php echo $entreprise->getNom(); ?></dd>
			<dt id="address1">Adresse 1</label>
			<dd><?php echo $entreprise->getAdresse1(); ?></dd>
			<dt id="address2">Adresse 2</dt>
			<dd><?php echo $entreprise->getAdresse2(); ?></dd>
			<dt id="postalCode">Code postal</label>
			<dd><?php echo $entreprise->getCodePostal(); ?></dd>
			<dt id="city">Ville</dt>
			<dd><?php echo $entreprise->getVille(); ?></dd>
			<dt id="country">Pays</dt>
			<dd><?php echo $entreprise->getPays(); ?></dd>
		</dl>
		<?php if ($_SESSION['user_auth']['write'])
			echo '<a href="entreprise-editer/'.$_GET['id'].'">Editer l\'entreprise</a>';
	} else { ?>
		<p class="warning">Cette entreprise n'existe pas</p>
	<?php } ?>
</div>