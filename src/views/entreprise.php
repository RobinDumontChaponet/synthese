<!--meta title="<?php echo ($entreprise != NULL)?$entreprise->getNom():'Entreprise non trouvé'; ?>" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<h1>Détails de l'entreprise</h1>
<?php if ($entreprise != NULL) { ?>
	<article>
		<h3 class="entreprise"><?php echo $entreprise->getNom(); ?></h3>
		<dl>
			<dt>Adresse 1</dt>
			<dd id="adresse1"><?php echo $entreprise->getAdresse1(); ?></dd>
			<dt>Adresse 2</dt>
			<dd id="adresse2"><?php echo $entreprise->getAdresse2(); ?></dd>
			<dt>Code postal</dt>
			<dd id="codePostal"><?php echo $entreprise->getCodePostal(); ?></dd>
			<dt>Ville</dt>
			<dd id="ville"><?php echo $entreprise->getVille(); ?></dd>
			<dt>Pays</dt>
			<dd id="pays"><?php echo $entreprise->getPays(); ?></dd>
		</dl>
		<?php if ($_SESSION['user_auth']['write'])
		echo '<a href="entreprise-editer/'.$_GET['id'].'">Editer l\'entreprise</a>';
		?>
	</article>
<?php
	} else { ?>
		<p class="warning">Cette entreprise n'existe pas</p>
	<?php } ?>
</div>