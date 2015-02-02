<!--meta title="Etablissements" css="style/evenements.css"-->
<div id="content">
<?php if ($etablissements != NULL) { ?>
	<h1>Établissements</h1>
	<a class="add" href="etablissement-ajouter">Ajouter un nouvel établissement</a>
	<section>
		<ul>
			<?php foreach ($etablissements as $etablissement) {
			echo '<li>';
			if ($_SESSION['user_auth']['write']) {
				echo '<a class="edit" href="etablissement-editer/'.$etablissement->getId().'">Modifier</a><a class="delete" href="index.php?requ=etablissement-supprimer&id='.$etablissement->getId().'">Supprimer</a>';
			} ?>
				<h3><a href="etablissement/<?php echo $etablissement->getId(); ?>"><?php echo $etablissement->getNom();?></a></h3>
				<dl>
					<dt>Adresse 1</dt>
					<dd id="adresse1"><?php echo $etablissement->getAdresse1();?></dd>
					<dt>Ville</dt>
					<dd id="ville"><?php echo $etablissement->getVille();?></dd>
					<dt>Pays</dt>
					<dd id="pays"><?php echo $etablissement->getPays();?></dd>
					<dt>Site Web</dt>
					<dd id="web"><a target="_blank" href="http://<?php echo $etablissement->getWeb();?>"><?php echo $etablissement->getWeb();?></a></dd>
				</dl>
			</li>
			<?php } ?>
		</ul>
	</section>
<?php
} else { ?>
	<a class="add" href="etablissement-ajouter">Ajouter un nouvel établissement</a>
	<p class="warning">Aucun établissement</p>
<?php } ?>
</div>
