<!--meta title="<?php echo 'Poste : '.(($poste != NULL)?$poste->getLibelle():'Poste non trouvé'); ?>" css="style/evenements.css"-->
<div id="content">
	<h1>Modification du poste <?php echo 'Poste : "'.(($poste != NULL)?$poste->getLibelle():'Poste non trouvé').'"'; ?></h1>
	<?php if (isset($poste) && $poste != NULL && $_SESSION['user_auth']['write']) { ?>
	<form action="poste-editer/<?php echo $poste->getId()?>" method="post">
		<article>
			<dl>
				<dt><label for="poste">Nom</label></dt>
				<dd class="poste"><input id="poste" name="poste" type="text" placeholder="Pas de libelle..." value="<?php echo $poste->getLibelle(); ?>" autofocus/></dd>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
	</form>
	<?php } else {?>
	<p class="warning">Ce poste n'existe pas</p>
	<?php }?>
</div>