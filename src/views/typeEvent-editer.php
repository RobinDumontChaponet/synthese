<!--meta title="Modification du type d'évènement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($typeEvent != NULL) { ?>
		<form action="typeEvent-editer/<?php echo $typeEvent->getId()?>" method="post">
			<h1>Modification du type d'évènement</h1>
			<ul>
				<li>
					<label for="libelle">Nom du type d'évènement</label>
					<input id="libelle" name="libelle" type="text" placeholder="Nom du type d'évènement" value="<?php echo $typeEvent->getLibelle()?>" />
				</li>
			<input type="submit" value="Enregistrer les modifications" />
		</form>
	<?php } else {?>
			<p class="warning">Ce type d'évènement ne peut être modifié car il n'existe pas</p>
	<?php }?>
</div>