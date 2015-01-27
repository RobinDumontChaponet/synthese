<!--meta title="<?php echo (($diplome != NULL)?'Diplôme : '.$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write'])
		echo '<a class="edit" href="diplome-editer/'.$_GET['id'].'">Editer...</a>';
	?>
	<h1>Détails du diplôme</h1>
<?php if ($diplome != NULL) { ?>
	<article>
		<h3 class="diplome"><?php echo $diplome->getLibelle();?></h3>
		<dl>
			<dt>Domaine</dt>
			<dd class="domaine"><?php echo $diplome->getDomaine()->getLibelle();?></dd>
			<dt>Description</dt>
			<dd class="description"><?php echo $diplome->getDomaine()->getDescription();?></dd>
		</dl>
	</article>
<?php
} else {?>
	<p class="warning">Ce diplôme n'existe pas</p>
<?php }?>
</div>