<!--meta title="Etablissements" css="style/evenements.css"-->
<div id="content">
	<?php if ($etablissements != NULL) { ?>
		<a class="add" href="etablissement-ajouter">Ajouter un nouvel établissement</a>
		<h1>Établissements</h1>
		<ul>
			<?php foreach ($etablissements as $etablissement) { ?>
			<li>
				<a href="etablissement/<?php echo $etablissement->getId(); ?>"><?php echo $etablissement->getNom();?></a>
				<dl>
					<dt>Adresse 1</dt>
					<dd id="adresse1"><?php echo $etablissement->getAdresse1();?></dd>
					<dt>Ville</dt>
					<dd id="ville"><?php echo $etablissement->getVille();?></dd>
					<dt>Pays</dt>
					<dd id="pays"><?php echo $etablissement->getPays();?></dd>
					<dt>Site Web</dt>
					<dd id="web"><a href="<?php echo $etablissement->getWeb();?>"><?php echo $etablissement->getWeb();?></a></dd>
				</dl>
			</li>
			<?php } ?>
		</ul>
	<?php
	} else { ?>
		<a class="add" href="etablissement-ajouter">Ajouter un nouvel établissement</a>
		<p class="warning">Aucun établissements</p>
	<?php } ?>
</div>