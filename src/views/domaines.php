<!--meta title="Domaines"-->
<div id="content">
<?php if ($domaines != NULL) {
?>
	<h1>Domaines</h1>
	<?php if ($_SESSION['user_auth']['write'])
		echo '<a class="add" href="domaine-ajouter">Ajouter un nouveau domaine</a>
		<a class="getback "href="javascript:history.go(-1)">Retour</a>';

	?>
	<section>
	<?php foreach ($domaines as $domaine) { ?>
		<ul>
			<li>
				<a class="edit" href="domaine-editer/<?php echo $domaine->getId() ?>">Éditer</a><a class="delete" href="index.php?requ=domaine-supprimer&id=<?php echo $domaine->getId() ?>">Supprimer</a>
				<h2 class="domaine"><?php echo $domaine->getLibelle();?></h2>
				<dl>
					<dt>Description</dt>
					<dd class="description"><?php echo $domaine->getDescription();?></dd>
				</dl>
			</li>
		</ul>
	<?php } ?>
	</section>
<?php
} else { ?>
	<p class="sad">Aucun domaine</p>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
<?php } ?>
</div>