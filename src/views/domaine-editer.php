<!--meta title="Modification du domaine <?php if ($domaine != NULL) { echo $domaine->getLibelle();} else { echo 'Domaine non trouvé'; }?>" css="style/evenements.css"-->
<div id="content">
<?php if ($domaine != NULL || $noId) { ?>
	<h1>Modification du domaine <?php echo $domaine->getLibelle()?></h1>
	<form action="domaine-editer/<?php echo $domaine->getId();?>" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Libelle</label></dt>
				<dd class="domaine"><input type="text" id="libelle" name="libelle" placeholder="Libelle du domaine" value="<?php echo $domaine->getLibelle(); ?>" autofocus/></dd>
				<dt><label for="description">Description</label></dt>
				<dd class="description"><input type="text" id="description" name="description" placeholder="Description du domaine" value="<?php echo $domaine->getDescription(); ?>"/></dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer" />
		<script>backButton()</script>
	</form>
<?php
} else { ?>
	<p class="warning">Domaine non trouvé</p>
	<script>backButton()</script>
<?php } ?>
</div>