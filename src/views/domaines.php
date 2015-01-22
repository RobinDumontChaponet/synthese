<!--meta title="Domaines" css="style/evenements.css"-->
<div id="content">
	<?php if ($domaines != NULL) {
		if ($_SESSION['user_auth']['write'])
			echo '<a class="add" href="domaine-ajouter">Ajouter un nouveau domaine</a>'; 
	?>
		<h1>Domaines</h1>
		<ul>
			<?php foreach ($domaines as $domaine) { ?>
			<li>
				<h2><?php echo $domaine->getLibelle();?></h2>
				<dl>
					<dt>Description</dt>
					<dd id="description"><?php echo $domaine->getDescription();?></dd>
				</dl>
				<a class="edit" href="domaine-editer/<?php echo $domaine->getId() ?>">Modifier</a><a class="delete" href="index.php?requ=domaine-supprimer&id=<?php echo $domaine->getId() ?>">Supprimer</a>
			</li>
			<?php } ?>
		</ul>
	<?php
	} else { ?>
		<a class="add" href="domaine-ajouter">Ajouter un nouveau domaine</a>
		<p class="warning">Aucun domaines</p>
	<?php } ?>
</div>