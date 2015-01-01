<!--meta title="<?php echo (($etablissement != NULL)?$etablissement->getNom():'Établissement non trouvé'); ?>" css="style/evenements.css"-->
<div id="content">
<?php if ($etablissement != NULL) {
	if ($_SESSION['user_auth']['write'])
		echo '<a class="edit" href="etablissement-editer/'.$_GET['id'].'">Editer...</a>';
?>
	<h1>Détails de l'établissement</h1>
	<article>
		<h3 class="etablissement"><?php echo $etablissement->getNom();?></h3>
		<dl>
			<dt>Adresse 1</dt>
			<dd id="adresse1"><?php echo $etablissement->getAdresse1();?></dd>
			<dt>Adresse 2</dt>
			<dd id="adresse2"><?php echo $etablissement->getAdresse2();?></dd>
			<dt>Code postal</dt>
			<dd id="codePostal"><?php echo $etablissement->getCodePostal();?></dd>
			<dt>Ville</dt>
			<dd id="ville"><?php echo $etablissement->getVille();?></dd>
			<dt>Pays</dt>
			<dd id="pays"><?php echo $etablissement->getPays();?></dd>
			<dt>Fax</dt>
			<dd id="fax"><a href="tel:<?php echo $etablissement->getFax();?>"><?php echo $etablissement->getFax();?></a></dd>
			<dt>Site Web</dt>
			<dd id="web"><a href="<?php echo $etablissement->getWeb();?>"><?php echo $etablissement->getWeb();?></a></dd>
		</dl>
	</article>
<?php
} else {
?>
	<p class="warning">Cette entreprise n'existe pas</p>
<?php } ?>
</div>